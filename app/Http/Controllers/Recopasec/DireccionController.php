<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccione;

class DireccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}
