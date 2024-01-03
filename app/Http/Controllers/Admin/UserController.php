<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
    UserRequest,
    UserProfileRequest,
};
use App\Models\{
    Profile,
    User,
};
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user, $profile;

    public function __construct(User $user, Profile $profile)
    {
        $this->user = $user;
        $this->profile = $profile;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->user->paginate();
        return view('admin.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->user->create($data);
        return redirect()->route('admin.user.index');
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
        $data = $this->user->find($id);
        return view('admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = $this->user->find($id);
        $data = $request->all();
        if($data['password'] = ''){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = $this->user->find($id);
        $data->delete();
        return redirect()->route('admin.user.index');
    }

    public function profile($idUser)
    {
        $data = $this->user->find($idUser);
        $profiles = $this->profile->all();
        return view('admin.users.profile', compact('data', 'profiles'));
    }

    public function profileAdd(UserProfileRequest $request, $idUser)
    {
        $user = $this->user->find($idUser);
        $data = $request->all();
        $profile = $user->profiles()->whereHas('users', function($query) use ($data){
            $query->where('profiles.id', $data['profile_id']);
        })->exists();

        if(!$profile){
            $user->profiles()->attach($data['profile_id']);
            return redirect()->back()->with(['info' => 'Perfil atribuído com sucesso!']);
        }
        return redirect()->back()->with(['error' => 'Perfil já está atribuído ao usuário!']);
    }

    public function profileRmv($idUser, $idProfile)
    {
        $user = $this->user->find($idUser);
        $profile = $this->user->find($idProfile);
        $user->profiles()->detach($profile);
        return redirect()->back()->with(['info' => 'Perfil desvinculado com sucesso!']);
    }
}
