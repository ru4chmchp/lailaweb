<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function __construct(
        private Setting $setting
    ) {
    }
    public function index()
    {
        $settings = $this->setting->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create()
    {
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $request)
    {
        $settings = $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('settings.index',compact('settings'));
    }
    public function edit($id)
    {
        $settings = $this->setting->find($id);
        return view('admin.setting.edit',compact('settings'));
    }
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,

            ];
            $this->setting->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('settings.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }   
    }
    public function destroy($id)
    {
        try {
            $this->setting->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }
}
