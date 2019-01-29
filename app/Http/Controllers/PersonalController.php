<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PersonalController extends Controller
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
        $payments = Payment::paginate(10)->where('created_at', '>=', date('Y-m-d').' 00:00:00');

        return view('personal.index', compact('payments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'total' => 'required|integer|max:10000',
            'currency' => 'required',
            'description' => 'required|string|max:500',
        ]);

        Payment::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'total' => $request->total,
            'currency' => $request->currency,
            'description' => $request->description,
        ]);
        return redirect('/personal');
    }
}
