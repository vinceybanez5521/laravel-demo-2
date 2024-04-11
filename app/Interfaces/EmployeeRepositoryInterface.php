<?php
namespace App\Interfaces;

use App\Models\Employee;
use Illuminate\Http\Request;

interface EmployeeRepositoryInterface 
{

    public function all();
    public function findById($id);
    public function create(Request $request);
    public function update(Request $request, Employee $employee);
    public function delete(Employee $employee);

}