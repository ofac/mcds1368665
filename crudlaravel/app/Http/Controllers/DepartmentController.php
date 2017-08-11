<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Municipality;

class DepartmentController extends Controller
{
    public function index() {
    	$deps = Department::all();
    	return view('selects')->with('deps', $deps);
    }

    public function loadmuns(Request $request) {
    	$muns = Municipality::where('dep_id', '=', $request->get('id_dep'))->get();
    	return view('muns')->with('muns', $muns);
    }
}
