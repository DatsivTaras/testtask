<?php

namespace App\Models;

use App\Classes\Enum\EmployeeSex;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employees
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $sex
 * @property int $salary
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EmployeesDepartaments $departmentsEmployees
 */
class Employees extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'sex',
        'salary'
    ];

    /*
     * @return array
     */
    public static function sexList()
    {
        return [
            EmployeeSex::MAN => __('employee.man'),
            EmployeeSex::WOMAN => __('employee.woman')
        ];
    }

    /*
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }

    /*
     * @return string
     */
    public function getSex()
    {
        $sexList = self::sexList();
        return array_key_exists($this->sex, $sexList) ? $sexList[$this->sex] : '';
    }

    /*
     * @param int $departmentId
     * 
     * @return string
     */
    public function inDepartment(int $departmentId)
    {
        return $this->departmentsEmployees()
            ->where(['department_id' => $departmentId])
            ->exists();
    }

    /*
     * @return HasMany
     */
    public function departmentsEmployees()
    {
        return $this->hasMany(EmployeesDepartaments::class, 'employee_id', 'id');
    }
}
