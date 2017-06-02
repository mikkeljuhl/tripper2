<?php

namespace App\Http\Controllers\Organization;

use App\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Log;


class OrganizationController extends Controller
{
    public function index()
    {

        if(Auth::check()) {
            $organization = Auth::user()->organization()->first();
            return view('organization.index', ['organization' => $organization]);
        } else {
            $this->register();
        }
    }

    public function register()
    {
        return view('organization.register');
    }

    public function store(Request $request)
    {

        if (!Auth::check()) {
            abort(403, 'unauthorized');
        }

        $this->validate($request, [
            'name' => 'required|unique:organizations|max:255',
            'email' => 'required|exists:users,email',
        ]);

        $organization = new Organization;
        $organization->name = $request->name;

        $user = User::where('email',$request->email)->first();

        $organization->save();
        $organization->users()->save($user);

        Log::info('Organization created.', ['name' => $organization->name]);

        return view('organization.index');
    }

}
