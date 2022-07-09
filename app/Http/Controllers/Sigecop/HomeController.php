<?php

namespace App\Http\Controllers\Sigecop;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Document;
use  App\Models\Message;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user =  \Auth::user();     

        return view('home',[
            'notification' => 'hola'
        ]);
    }
}
