<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function __construct(
        private Role $role,
        private Permission $permission
    ) {
    }
    public function index()
    {
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionParent'));
    }
    public function store(Request $request)
    {
        $roles = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roles->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permission = $role->permissions;
        return view('admin.role.edit', compact('permissionParent', 'role', 'permission'));
    }
    public function update(Request $request, $id)
    {
        $roles = $this->role->find($id);
        $roles->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $roles->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function destroy($id)
    {
        try {
            $this->role->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function createPermission()
    {
        return view('admin.role.addPermission');
    }
    public function storePermission(Request $request)
    {
        $permission = $this->permission->create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0
        ]);
        foreach ($request->module_chil as $value) {
            $this->permission->create([
                'name' => $value,
                'display_name' => $value,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent . '_' .$value
            ]);
        }
        return redirect()->route('permissions.create');
    }
}
