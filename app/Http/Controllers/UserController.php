<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Feeds;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin', 'active'], ['except' => ['show', 'create', 'store']]);
    }

    public function index()
    {
          try {

              $users = User::all();


              return view('users.index', compact('users'));

    } catch (\Exception $ex) {
              return redirect()->back()->with('error', $ex->getMessage());
          }

}




    public function create()
    {
        //
        try {
            return view('users.create');
        }
        catch (\Exception $ex) {
            return redirect()->back()->with('error');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        try {

            $users = new User();

            $users->name = Input::get('name');
            $users->email = Input::get('email');
            $users->password = bcrypt(Input::get('password'));

            if(count(User::get()) == 0){
                $users->role = "Admin";
            } else {
                $users->role = "Normal user";
            }

            $users->is_active = true;
            $users->save();

            return redirect(url('dashboard/users'))->with('success');

        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsers($id)
    {
        try {
            $user = User::where('id', $id)->first();

            $feeds = Feeds::where('user_id', $id)->paginate(10);

            return view('users.show', compact('user', 'feeds'));
        }
        catch (\Exception $ex) {
            dd($ex->getMessage());
             return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function show()
    {
        try {
            $us = Auth::user();
            $user = User::where('id', $us->id)->first();

            $feeds = Feeds::where('user_id', $us->id)->latest('created_at')->paginate(10);

            return view('users.show', compact('user', 'feeds'));
        }
        catch (\Exception $ex) {

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $users = User::where('id', $id)->first();
            $activated = $users->is_active;
            return view('users/edit', compact('users', 'activated'));
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            if (Input::get('password') != null){
                $user->password = bcrypt(Input::get('password'));
            }

            if(Input::get('is_active') == 'active') {
                $user->is_active = true;
            } elseif (Input::get('is_active') == 'inactive') {
                $user->is_active = false;
            }

            $user->save();

            return redirect(url('dashboard/users'))->with('success');

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->is_active = false;
            $user->save();
            return redirect()->back()->with('success');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function activate($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->is_active = true;
            $user->save();
            return redirect()->back()->with('success');
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

}
