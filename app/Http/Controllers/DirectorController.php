<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Payment;

class DirectorController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('director.index');
    }

    public function showPersonal(){

        $users = \DB::table('payments')
            ->join("users", "payments.user_id", "=", "users.id")
            ->select(
                'user_id',
                'users.name',
                'users.email',
                \DB::raw('count(*) total_count'),
                \DB::raw('sum(total) total_sum')
            )
            ->where('payments.created_at', '>=', date('Y-m-d').' 00:00:00')
            ->groupBy('user_id')
            ->get();

        return view('director.showPersonal', compact('users'));

    }

    public function settings(){

        $users = User::paginate(100)->where('role', '=', 'personal');
        return view('director.settings', compact('users'));
    }

    public function settingsEdit($id){

        $user = User::findOrFail($id);
        return view('director.personalEdit', compact('user'));
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
        $news = User::findOrFail($id);
        $news->update($request->all());

        return redirect('/settings');
    }

    public function addUser(){
        return view('director.addUser');
    }

    public function addUserStore(Request $request){

        /*
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);*/

        $this->validate($request, [
            'name' => 'required|string||min:3|max:20',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|max:500',
        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'personal'
        ]);
        return redirect('/director');

        //dd(Hash::make($request->getPassword()));

    }
}
