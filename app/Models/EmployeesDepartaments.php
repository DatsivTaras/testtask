<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeesDepartaments
 *
 * @property int $employee_id
 * @property int $department_id
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Departments $department
 */
class EmployeesDepartaments extends Model
{
    protected $fillable = [
        'employee_id',
        'department_id'
    ];

    /*
     * @return HasOne
     */
    public function department()
    {
        return $this->hasOne(Departments::class, 'id', 'department_id');
    }
}
