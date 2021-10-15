<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departments
 *
 * @property int $id
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EmployeesDepartaments $departmentsEmployees
 */
class Departments extends Model
{
    protected $fillable = [
        'name',
    ];
    
    /*
     * @return int
     */
    public function getMaxEmployeeSalary()
    {
        $departmentId = $this->id;

            return Employees::whereHas('departmentsEmployees', function($query) use ($departmentId) {
                return $query->where('department_id', $departmentId);
            })->max('salary');
    }
    
    /*
     * @return int
     */
    public function getEmployeesCount()
    {
        return $this->departmentsEmployees()->count();
    }

    /*
     * @return HasMany
     */
    public function departmentsEmployees()
    {
        return $this->hasMany(EmployeesDepartaments::class, 'department_id', 'id');
    }
}
