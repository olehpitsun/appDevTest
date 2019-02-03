<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Payment;
use App\Company;
use Auth;
use Mockery\Exception;

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
        $company = Company::all()
            ->where('id', '=',  Auth::user()->id);

        return view('director.index', compact('company'));
    }

    public function showPersonal(Request $request){

        $date = date('Y-m-d');
        if(isset($request->date) && $request->date != null){
            $date = $request->date;
        }

        $users = \DB::table('payments')
            ->join("users", "payments.user_id", "=", "users.id")
            ->select(
                'user_id',
                'users.name',
                'users.email',
                \DB::raw('count(*) total_count'),
                \DB::raw('sum(total) total_sum')
            )
            ->where('payments.created_at', '>=', $date.' 00:00:00')
            ->groupBy('user_id')
            ->get();

        return view('director.showPersonal', compact('users'));

    }

    /**
     * @param $id - user id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showOnePersonData($id){

        $payments = Payment::latest('created_at')
            ->where('user_id', '=', $id)
            ->where('created_at', '>=', date('Y-m-d').' 00:00:00')
            ->paginate(2);

        return view('director.showOnePerson', compact('payments'));
    }

    public function addUser(){
        return view('director.addUser');
    }

    public function addUserStore(Request $request){

        $this->validate($request, [
            'name' => 'required|string||min:3|max:30',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|max:500',
        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'personal'
        ]);

        try{
            $ml = new MailController();
            $ml->send($request->email, $request->name, $request->email, $request->password);
        }catch (Exception $exception){}


        return redirect('/director');

        //dd(Hash::make($request->getPassword()));

    }
}
