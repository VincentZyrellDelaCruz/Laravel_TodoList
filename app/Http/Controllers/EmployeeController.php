<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        // Soft delete employee with ID 10
        //Employee::where('id', '18')->delete();

        // Retrieve and return all soft-deleted employees
        return Employee::onlyTrashed()->get();
    }
}
