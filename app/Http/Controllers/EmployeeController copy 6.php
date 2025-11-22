<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
/*
class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        // MASS ASSIGNMENT
        /* $employee = Employee::create([
            'first_name' => 'Quandale',
            'last_name' => 'Dingle',
            'email' => 'quandale@gmail.com',
            'phone' => '1234567890',
            'position' => 'IT Manager',
            'department' => 'IT',
            'salary' => 75000,
            'hire_date' => date('2025-01-15'),
            'status' => 'Active'
        ]);

        // To Update an existing employee using mass assignment
        $employee = Employee::findOrFail(8)->update([
            'first_name' => 'Kermit',
            'last_name' => 'Dingle'
        ]);

        $employee = Employee::where('department', '=', 'IT')->update([
            'first_name' => 'UltraQuandale',
            'last_name' => 'Dingle'
        ]);

        dd('success');
    }
}
 */
