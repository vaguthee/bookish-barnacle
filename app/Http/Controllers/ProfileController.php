<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function __construct(Profile $profile)
    {
        $this->middleware('auth');
        $this->profile = $profile;
    }


    public function index(Request $request)
    {
        $profiles = $this->getProfiles($request->q);

        return view('index-profile', ['profiles' => $profiles, 'q' => $request->q]);
    }

    public function indexApi(Request $request)
    {
        $user = request()->user();

        $profiles = ($request->q) ? $this->profile->where('name', 'LIKE', "%$request->q%") : $this->profile;

        $profiles = $profiles->where('user_id', $user->id);

        return $profiles->orderBy('updated_at', 'desc')->get();
    }

    protected function getProfiles($q = null)
    {
        $user = request()->user();

        $profiles = ($q) ? $this->profile->where('name', 'LIKE', "%$q%") : $this->profile;

        if (!$this->isAsAdmin()) {
            $profiles = $profiles->where('user_id', $user->id);
        }

        return $profiles->orderBy('updated_at', 'desc')->get();
    }


    public function show(Profile $profile)
    {
        return view('show-profile', ['profile' => $profile]);
    }

    public function edit(Profile $profile)
    {
        return view('edit-profile', ['profile' => $profile]);
    }

    public function create()
    {
        return view('create-profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:Personal,Business',
        ]);

        $profile = $this->profile->create([
            "name" => $request->name,
            "type" => $request->type,
            "user_id" => $request->user()->id,
        ]);

        return redirect()->route('profiles.index');
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:Personal,Business',
        ]);

        $profile = $profile->update([
            "name" => $request->name,
            "type" => $request->type,
        ]);

        return redirect()->route('profiles.index');
    }

    public function switch(Request $request)
    {
        $request->validate([
            'profile_id' => 'required'
        ]);


        $user = $request->user();
        
        $profile = $this->profile->where('id', $request->profile_id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $user->acting_profile_id = $request->profile_id;
        $user->save();

        return $user->fresh();
    }

    public function destroy(Profile $profile)
    {
        dd("destroy",$profile);
    }
}
