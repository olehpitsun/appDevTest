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

        $arr1 = array();

        $users = User::paginate(100)->where('role', '=', 'personal');



        $t = \DB::table('payments')
            ->select(
                'user_id',
                \DB::raw('count(*) total'),
                \DB::raw('sum(total) open_count')
            )
            ->groupBy('user_id')
            ->get();

        dd($t);


        $activeUsers = \DB::table('payments')
            //->select('user_id', \DB::raw('count(*) as total1'))
            ->select('user_id', \DB::raw('SUM(total) as total_sales'))
            ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
            ->join(
                select('user_id', \DB::raw('count(*) as total'))
            )
            ->groupBy('user_id')
            //->orderBy('total', 'desc')
            ->get();


        dd($activeUsers);
        $activeUsers1 = \DB::table('payments')
            ->select('user_id', \DB::raw('count(*) as total'))
            ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->get();

        $results = $activeUsers->union($activeUsers1)->get();

        dd($results);

        foreach ($users as $user){

            $arr = array();

            $activeUsers = \DB::table('payments')
                ->select('user_id', \DB::raw('count(*) as total'))
                ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
                ->groupBy('user_id')
                ->orderBy('total', 'desc')
                ->get();
dd($activeUsers);
            array_push($arr, $activeUsers[0]->total);

            $orders = \DB::table('payments')
                ->select('user_id', \DB::raw('SUM(total) as total_sales'))
                ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
                ->groupBy('user_id')
                ->havingRaw('SUM(total) > ?', [2])
                ->get();

            array_push($arr, $orders[0]->total_sales);
            array_push($arr, $user->name);
            array_push($arr, $user->email);

            array_push($arr1, $arr);

            unset($arr);
        }

        dd($arr1);
        return view('director.showPersonal', compact('users'));

    }
}
