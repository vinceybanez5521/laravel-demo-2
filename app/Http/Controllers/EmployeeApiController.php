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
}
