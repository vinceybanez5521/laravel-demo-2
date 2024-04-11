<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $data = $this->employeeRepository->all();
        
        return view('employee.index', ['employees' => $data]);
    }
    
    public function show($id)
    {
        $data = $this->employeeRepository->findById($id);
                
        return view('employee.show', $data);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->employeeRepository->create($request);

        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);

        return view('employee.edit', ['employee' => $data]);
    }

    public function update(Request $request, Employee $employee)
    {
        $this->employeeRepository->update($request, $employee);

        return redirect()->route('employee.show', $employee->id);
    }

    public function destroy(Employee $employee) {
        $this->employeeRepository->delete($employee);

        return redirect()->route('employee.index');
    }
}
