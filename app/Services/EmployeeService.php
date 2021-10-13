<?php

namespace App\Services;

use App\Models\Employees;
use App\Models\EmployeesDepartaments;

/**
 * Class EmployeeService
 */
class EmployeeService
{

    public static function saveEmployeeDepartments(Employees $employee, array $departmentsIds)
    {
        // Delete all departments relations
        $employee->departmentsEmployees()->delete();

        if ($departmentsIds) {
            foreach($departmentsIds as $departmentId) {
                EmployeesDepartaments::create([
                    'employee_id' => $employee->id,
                    'department_id' => $departmentId
                ]);
            }
        }
    }
}
?>