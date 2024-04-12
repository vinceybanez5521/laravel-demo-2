<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Repositories\EmployeeMySqlRepository;
use Illuminate\Http\Request;
use Tests\TestCase;

class EmployeeRepositoryTest extends TestCase
{
    private $employeeRepository;

    public function setUp(): void {
        parent::setUp();
        $this->employeeRepository = new EmployeeMySqlRepository();
    }

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_all(): void {
        $employees = $this->employeeRepository->all();

        $this->assertTrue(count($employees) > 0);
    }

    public function test_find_by_id(): void {
        $employee = $this->employeeRepository->findById(1);

        $this->assertTrue($employee != null);
    }

    public function test_create(): void {
        $request = new Request();
        $request['first_name'] = 'Wendy';
        $request['last_name'] = 'Oranza';
        $request['email'] = 'wendy@gmail.com';
        $request['gender'] = 'Female';

        $employee = $this->employeeRepository->create($request);

        // $this->assertEquals(201, $employee->getStatusCode());
        $this->assertTrue($employee != null);
    }

    public function test_update(): void {
        $request = new Request();
        $request['first_name'] = 'Wendy';
        $request['last_name'] = 'Oranza';
        $request['email'] = 'wendy@gmail.com';
        $request['gender'] = 'Male';

        $employee = Employee::where('email', 'wendy@gmail.com')->first();
        $employee = $this->employeeRepository->update($request, $employee);

        $this->assertTrue($employee != null);
    }

    public function test_delete(): void {
        $employee = Employee::where('id', 100)->first();
        $response = $this->employeeRepository->delete($employee);

        $this->assertTrue($response != null);
    }
}
