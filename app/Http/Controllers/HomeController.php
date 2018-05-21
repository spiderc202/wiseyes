<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $request->user();
        if($users->roles == 1)
        {
          $data['id'] = $users->id;
            $data['users'] = User::all();
          return view('admin_home')->with($data);
        }
        else {
          $data['id'] = $users->id;
          $data['name'] = $users->name;
          $data['email'] = $users->email;
          $data['address'] = $users->address;
          $data['postcode'] = $users->postcode;
          $data['state'] = $users->state;
          $data['success'] = '';
          return view('home')->with($data);
        }
    }

   public function edit($id)
   {
         $users = User::find($id);
         $data['id'] = $users->id;
         $data['name'] = $users->name;
         $data['email'] = $users->email;
         $data['address'] = $users->address;
         $data['postcode'] = $users->postcode;
         $data['state'] = $users->state;
         $data['success'] = '';
         return view('edit')->with($data);

   }

    public function update(Request $request)
    {
      $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'address' => 'required|string|min:6',
          'postcode' => 'required|integer|digits:5',
          'state' => 'required|string|max:255',
      ]);

      $user = User::find($request->id);
      $user->name = $request->name;
      $user->address = $request->address;
      $user->postcode = $request->postcode;
      $user->state = $request->state;
      $request->session()->flash('status', 'User updated successfully!');
      $user->save();
      return redirect()->route('home');
    }

   public function update_user(Request $request)
   {
     $validatedData = $request->validate([
         'name' => 'required|string|max:255',
         'address' => 'required|string|min:6',
         'postcode' => 'required|integer|digits:5',
         'state' => 'required|string|max:255',
     ]);

     $user = User::find($request->id);
     $user->name = $request->name;
     $user->address = $request->address;
     $user->postcode = $request->postcode;
     $user->state = $request->state;
     $request->session()->flash('status', 'User updated successfully!');
     $user->save();
     return redirect()->route('admin_home');
   }


  public function create_user_form()
  {

        return view('create_user');

  }
  public function submit_create_user(Request $request)
  {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'address' => 'required|string|min:6',
        'postcode' => 'required|integer|digits:5',
        'state' => 'required|string|max:255',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->address = $request->address;
    $user->email = $request->email;
    $user->postcode = $request->postcode;
    $user->state = $request->state;
    $user->roles = 0;
    $user->password = Hash::make($request->password);
    $request->session()->flash('status', 'User created successfully!');
    $user->save();
    return redirect()->route('admin_home');
  }

   public function delete($id, Request $request)
   {
     User::destroy($id);
     $request->session()->flash('status', 'User deleted successfully!');
     return redirect()->route('admin_home');
   }
}
