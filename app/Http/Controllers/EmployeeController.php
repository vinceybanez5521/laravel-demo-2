<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        // dd($data) ;

        return view('employee.index', ['employees' => $data]);
    }

    public function show($id)
    {
        $data = Employee::where('id', $id)->get()->first();
        $data = Employee::where('id', $id)->first();
        $data = Employee::find($id);
        $data = Employee::findOrFail($id);
        // dd($data);

        return view('employee.show', $data);
    }
}
