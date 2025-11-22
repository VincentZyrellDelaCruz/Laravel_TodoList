<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
/*
class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        //$employee = Employee::findOrFail(1);
        $employee = Employee::where('id', '2')->first();
        $employee->first_name = 'Jason';
        $employee->last_name = 'Derulo';
        $employee->salary = 1000;

        $employee->save();
        dd('success');
    }
}
 */
