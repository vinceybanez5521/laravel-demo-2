<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * RESTful Resource Functions / Common Controller Functions
     * index    - get all data
     * show     - get specific data
     * create   - show create form
     * store    - insert/save data in the database
     * edit     - show edit form
     * update   - update data in the database
     * destroy  - delete data from the database
    */
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
