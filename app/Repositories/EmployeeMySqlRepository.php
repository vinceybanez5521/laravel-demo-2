<?php
namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeMySqlRepository implements EmployeeRepositoryInterface {

    public function all() {
        return Employee::paginate();
    }

    public function findById($id) {
        return Employee::findOrFail($id);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required']
        ]);

        return Employee::create($validated);
    }

    public function update(Request $request, Employee $employee) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email']
        ]);

        return $employee->update($validated);
    }

    public function delete(Employee $employee) {
        return $employee->delete();
    }

}