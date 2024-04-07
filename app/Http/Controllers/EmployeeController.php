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

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required']
        ]);

        Employee::create($validated);

        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);

        return view('employee.edit', ['employee' => $data]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email']
        ]);

        $employee->update($validated);

        return redirect()->route('employee.show', $employee->id);
    }

    public function destroy(Employee $employee) {
        $employee->delete();

        return redirect()->route('employee.index');
    }
}
