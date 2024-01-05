<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Models\Role;
use App\Services\Interfaces\IPermissionService;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected IPermissionService $permissionService;
    public function __construct(IPermissionService $permissionService)
    {
        $this->middleware(['auth', 'role_or_permission:admin|create user|create role|create permission']);
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permission = $this->permissionService->GetAllPermission();
        return view('permission.index', compact("permission"))->with('page', request()->input('page'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $permission = $this->permissionService->CreatePermission($request->all());
        return redirect()->route('permission.index')->with('success', 'Permission created successfully');
    }

    public function edit($id)
    {
        $permission = $this->permissionService->GetPermissionById($id);
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = $this->permissionService->UpdatePermission($id, $request->all());
        return redirect()->route('permission.index')->with('success', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        $permission = $this->permissionService->DeletePermission($id);
        return redirect()->route('permission.index', compact('permission'))->with('success', 'Permission deleted successfully');
    }
}