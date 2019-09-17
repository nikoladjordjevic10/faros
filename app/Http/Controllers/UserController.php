<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function __construct()
  {
    
    $this->middleware('auth');

  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $users = User::all();

    return view('admin.user.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    
    $user = new User();

    return view('admin.user.create', compact('user'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    
    $data = request()->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'username' => 'required|string|max:255|unique:users',
      'password' => 'required|string|min:8|regex:/[0-9]/|confirmed'
    ]);

    $data['password'] = Hash::make($data['password']);

    User::create($data);

    return redirect('admin/users')->with('message', 'User created successfully');

  }

  /**
   * Display the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    
    return view('admin.user.show', compact('user'));

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    
    return view('admin.user.edit', compact('user'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    
    request()->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
      'username' => 'required|string|max:255|unique:users,username,' . $user->id,
    ]);

    if(request()->has('password') && request('password') != ''){
      request()->validate([
        'password' => 'required|string|min:8|regex:/[0-9]/|confirmed'
      ]);

      $user->password = Hash::make(request('password'));
    }

    $user->first_name = request('first_name');
    $user->last_name = request('last_name');
    $user->email = request('email');
    $user->username = request('username');
    $user->save();

    return redirect('admin/users/' . $user->id)->with('message', 'User updated successfully');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    
    $user->delete();

    return redirect('admin/users')->with('message', 'User deleted successfully');

  }

}
