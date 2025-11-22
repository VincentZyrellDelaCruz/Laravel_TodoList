<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
/* 
class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        $employees = Employee::all();

        // return Employee::where('department', '=', 'IT')->get();
        // return Employee::where('salary', '>=', 60000)->get();
        // return Employee::where('department', '=', 'IT')->where('salary', '>=', 60000)->get();

        return Employee::where('department', '=', 'IT')->orWhere('salary', '>=', 60000)->get();

    }
} */
