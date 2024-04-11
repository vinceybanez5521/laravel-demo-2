<?php

namespace App\Http\Controllers;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    private $employeeRepositoryInterface;

    // Polymorphism
    public function __construct(EmployeeRepositoryInterface $employeeRepositoryInterface)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->employeeRepositoryInterface = $employeeRepositoryInterface;
    }

    public function index()
    {
        $data = $this->employeeRepositoryInterface->all();
        
        return view('employee.index', ['employees' => $data]);
    }
    
    public function show($id)
    {
        $data = $this->employeeRepositoryInterface->findById($id);
                
        return view('employee.show', $data);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $this->employeeRepositoryInterface->create($request);

        return redirect()->route('employee.index');
    }

    public function edit($id)
    {
        $data = Employee::findOrFail($id);

        return view('employee.edit', ['employee' => $data]);
    }

    public function update(Request $request, Employee $employee)
    {
        $this->employeeRepositoryInterface->update($request, $employee);

        return redirect()->route('employee.show', $employee->id);
    }

    public function destroy(Employee $employee) {
        $this->employeeRepositoryInterface->delete($employee);

        return redirect()->route('employee.index');
    }
}
