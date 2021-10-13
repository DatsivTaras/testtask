<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStore;
use App\Models\Departments;
use App\Models\Employees;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /*
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sexes = Employees::sexList();
        $employees = Employees::paginate(20);
        
        return view('employee.index', compact('employees', 'sexes'));
    }

    /*
     * @return \Illuminate\View\View
     */
    public function create() 
    {
        $sexes = Employees::sexList();
        $departments = Departments::all();

        return view('employee.create', compact('departments', 'sexes'));
    }

    /*
     * @param EmployeeStore $request
     */
    public function store(EmployeeStore $request)
    {
        $employee = new Employees();
        $employee->fill($request->all());
        $employee->save();

        EmployeeService::saveEmployeeDepartments($employee, $request->departments);
        
        return redirect()->route('employees.index');
    }

    /*
     * @param EmployeeStore $request
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, int $id)
    {
        $sexes = Employees::sexList();
        $departments = Departments::all();
        $employee = Employees::where('id', $id)->first();
        
        return view('employee.edit', compact('departments', 'sexes', 'employee'));
    }

    /*
     * @param EmployeeStore $request
     * @param int $id
     */
    public function update(EmployeeStore $request, int $id)
    {
        $employee = Employees::find($id);
        $employee->fill($request->all());
        $employee->save();

        EmployeeService::saveEmployeeDepartments($employee, $request->departments);
        
        return redirect()->route('employees.index');
    }

    /*
     * @param int $id
     */
    public function destroy(int $id)
    {
        Employees::find($id)->delete();

        return redirect()->route('employees.index');
    }
}
 