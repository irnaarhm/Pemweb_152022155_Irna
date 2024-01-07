<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data['title'] = 'User List';
        $data['users'] = User::all();
        return view('admin.users', $data);
    }

    public function create()
    {
        $data['title'] = 'Add User';
        return view('admin.add-users', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',
            'is_role' => 'required'
        ]);

        $users = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'is_role' => $request->input('is_role')

        ]);

        if ($users) {
            return redirect()->route('users.index')->with('message', 'Successfully Add Customer!');
        } else {
            return redirect()->route('users.create')->with('error', 'An Error Occurred While Adding Customer!');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['users'] = User::where('id', $id)->first();
        return view('admin.edit-users', $data);
    }

    public function update(Request $request, $id)
    {
        $data['title'] = 'Add User';
        $user = User::findOrFail($id);
        if ($request->input('password') != "") {
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'is_role' => $request->input('is_role'),
            ]);
            if ($user) {
                return redirect()->route('users.index')->with('message', 'Successfully Edit Customer!');
            } else {
                return redirect()->route('users.create')->with('error', 'An Error Occurred While Editing Customer!');
            }
        } else {
            $user->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'is_role' => $request->input('is_role'),
            ]);
            if ($user) {
                return redirect()->route('users.index')->with('message', 'Successfully Edit Customer!');
            } else {
                return redirect()->route('users.edit')->with('error', 'An Error Occurred While Editing Customer!');
            }
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user) {
            return redirect()->route('users.index')->with('message', 'Successfully Delete Customer!');
        } else {
            return redirect()->route('users.index')->with('error', 'An Error Occurred While Deleting Customer!');
        }
    }
}
