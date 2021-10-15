<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Employees;

class HomeController extends Controller
{
    /*
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employees::paginate(20);
        $departments = Departments::all();

        return view('index', compact('employees', 'departments'));
    }
}
