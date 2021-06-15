<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginsession extends Controller
{
    public function logincheck(Request $req)
    {
    	return redirect("/home");
    }
}
