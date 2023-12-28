<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

class ProfileController extends Controller
{

    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
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
}
