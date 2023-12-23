<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\{
    Permission
};

class PermissionController extends Controller
{

    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->permission->paginate();
        return view('admin.permissions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = $this->permission->find($id);
        return view('admin.permissions.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
