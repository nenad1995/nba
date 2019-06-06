<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!auth()->attempt($request->only(['email','password']))){
            return back()->withErrors([
            'message' => 'Wrong login Credentials'
            ]);
        }else {

            if(auth()->user()->is_verified) {

                return redirect()->route('teams-index');
            } else {
                $this->logout();
                return back()->withErrors(['message' => 'You are not verified, please check your email for verification!']);
            }
        }
    }

    public function verification ($id) {

        $user = User::find($id);

        $user->is_verified = true;
        $user->save();

        return view('login.verification', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function logout(){
        auth()->logout();
        return redirect()->route('teams-index');
    }






}
