<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {    
        $courses = Course::all(); 
    	return view('backend.'. Auth::user()->role .'.dashboard.index',compact('courses'));
    }
   

   
}
