<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentStore;
use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /*
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $departaments = Departments::paginate(10);

        return view('departament/index', compact('departaments'));
    }

    /*
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('departament/create');
    }

    /*
     * @param DepartamentStore $request
     */
    public function store(DepartamentStore $request)
    {
        $departament = new Departments();
        $departament->name = $request->name;
        $departament->save();

        return redirect()->route('departaments.index');
    }

    /*
     * @param int $id
     * 
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $departament = Departments::where('id', $id)->firstOrFail();

        return view('departament/edit', compact('departament'));
    }
    
    /*
     * @param DepartamentStore $request
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function update(DepartamentStore $request, int $id)
    {
        $departament = Departments::find($id);
        $departament->fill($request->all());
        $departament->save();
    
        return redirect()->route('departaments.index');
    }

    /*
     * @param int $id
     */
    public function destroy(int $id)
    {
        $departament = Departments::find($id);
        if ($departament->getEmployeesCount()) {
            abort('403', 'В етом отделе есть сортудники, поетому его нельзя удалить');
        }
        $departament->delete();

        return redirect()->route('departaments.index');
    }
}
