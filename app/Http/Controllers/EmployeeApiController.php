<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index() {
        $data = Employee::all();
        $data = Employee::paginate();

        return $data;
    }

    public function show($id) {
        $data = Employee::findOrFail($id);

        return $data;
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required'],
        ]);

        return Employee::create($validated);
    }

    public function update(Request $request, Employee $employee) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required'],
        ]);

        return $employee->update($validated);
    }

    public function destroy(Employee $employee) {
        return $employee->delete();
    }
}
