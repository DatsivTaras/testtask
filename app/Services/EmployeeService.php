<?php

namespace App\Services;

use App\Models\Employees;
use App\Models\EmployeesDepartaments;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployeeService
 */
class EmployeeService
{
    /**
     * Delete Employee with relations
     * 
     * @param int $id
     */
    public static function deleteEmployee(int $id)
    {
        if ($employee = Employees::find($id)) {

            DB::beginTransaction();
            try {
                $employee->departmentsEmployees()->delete();
                $employee->delete();

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
                throw new Exception($e->getMessage());
            }
        }
    }

    /**
     * @param Employees $employee
     * @param array $departmentsIds
     */
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