<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterAddRequest;
use App\Models\Newsletter;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsletterController extends Controller
{
    use StorageImageTrait;
    public function __construct(
        private Newsletter $newsletter
    ) {
    }
    public function index()
    {
        $newsletters = $this->newsletter->latest()->paginate(5);
        return view('admin.newsletter.index', compact('newsletters'));
    }
    public function create()
    {
        return view('admin.newsletter.add');
    }
    public function store(NewsletterAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->name,
                'content' => $request->content
            ];
            $dataImageNewsletter = $this->storageImageTrait($request, 'image_path', 'newsletter');
            if (!empty($dataImageNewsletter)) {
                $dataInsert['image_name'] = $dataImageNewsletter['file_name'];
                $dataInsert['image_path'] = $dataImageNewsletter['file_path'];
            }
            $this->newsletter->create($dataInsert);
            DB::commit();
            return redirect()->route('newsletters.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $newsletters = $this->newsletter->find($id);
        return view('admin.newsletter.edit',compact('newsletters'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->name,
                'content' => $request->content,
            ];
            $dataImageNewsletter = $this->storageImageTrait($request, 'image_path', 'newsletter');
            if (!empty($dataImageNewsletter)) {
                $dataUpdate['image_name'] = $dataImageNewsletter['file_name'];
                $dataUpdate['image_path'] = $dataImageNewsletter['file_path'];
            }
            $this->newsletter->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('newsletters.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
        }   
    }
    public function destroy($id)
    {
        try {
            $this->newsletter->find($id)->delete();
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
