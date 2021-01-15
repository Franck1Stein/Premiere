<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('role:user|administrator');
  }

  public function index()
  {
      $users = User::all();
      return view('user.index')->with('users', $users);
  }
}
