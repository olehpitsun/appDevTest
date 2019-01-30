<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

        $users = User::paginate(100);
        return view('director.settings', compact('users'));
    }
}
