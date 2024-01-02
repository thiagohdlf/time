<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
    ProfileRequest, ProfilePermissionRequest
};
use App\Models\{
    Permission,
    Profile,
};

class ProfileController extends Controller
{

    private $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->profile->paginate();
        return view('admin.profiles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        $this->profile->create($request->all());
        return redirect()->route('admin.profile.index');
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
        $data = $this->profile->find($id);
        return view('admin.profiles.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, string $id)
    {
        $data = $this->profile->find($id);
        $data->update($request->all());
        return redirect()->route('admin.profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->profile->find($id);
        $data->delete();
        return redirect()->route('admin.profile.index');
    }

    public function permission($idProfile)
    {
        $data = $this->profile->find($idProfile);
        $permissions = $this->permission->all();
        return view('admin.profiles.permission', compact('data', 'permissions'));
    }

    public function permissionAdd(ProfilePermissionRequest $request, $idProfile)
    {
        $profile = $this->profile->find($idProfile);
        $data = $request->all();
        $permission = $profile->permissions()->whereHas('profiles', function($query) use ($data){
            $query->where('permissions.id', $data['permission_id']);
        })->exists();

        if(!$permission){
            $profile->permissions()->attach($data['permission_id']);
            return redirect()->back();
        }

        return redirect()->back()->with(['error' => 'Permissão já está atribuída ao perfil!']);
    }

    public function permissionRmv($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);
        $profile->permissions()->detach($permission);
        return redirect()->back()->with(['info' => 'Permissão desvinculada com sucesso!']);
    }
}
