<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('page.index', compact('users'));
    }

    public function create()
    {
        return view('page.add');
    }

    public function store(UserRequest $request)
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = uniqid(). "_" .$request->avatar->getClientOriginalName();
            $request->file('avatar')->storeAs('public', $avatar);
        }

        User::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'avatar' => $avatar,
            'gender' => $request->gender
        ]);

        return redirect()->route('users.index')->with('message', __('messages.success.store'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('page.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $avatar = uniqid(). "_" .$request->avatar->getClientOriginalName();
            $request->file('avatar')->storeAs('public', $avatar);
            $image = User::find($id)->avatar;
            Storage::delete('public/'.$image);    
            $data['avatar'] = $avatar;
        }

        User::find($id)->update($data);

        return redirect()->route('users.index')->with('message', __('messages.success.update'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index');
    }
}
