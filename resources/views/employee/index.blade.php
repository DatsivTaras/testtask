@extends('layouts.app')

@section('content')
    <div class='container'>
        <div align='right'>
            <a href='employees/create' class='btn btn-success'>+ {{__('employee.employees')}} </a>
        </div>
        <h3 align='center'>{{__('employee.employees')}}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{__('employee.name')}}</th>
                    <th scope="col">{{__('employee.surname')}}</th>
                    <th scope="col">{{__('employee.patronymic')}}</th>
                    <th scope="col">{{__('employee.sex')}}</th>
                    <th scope="col">{{__('employee.salary')}}</th>
                    <th scope="col">{{__('department.departments')}}</th>
                </tr>
            </thead>
            @if($employees->total() > 0)
                <tbody>
                @foreach($employees as $employee)
                    <tr class='js-destroy-{{$employee->id}}'>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->surname}}</td>
                        <td>{{$employee->patronymic}}</td>
                        <td>{{$employee->getSex()}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>
                            @foreach($employee->departmentsEmployees as $departmentEmployee )
                                {{$departmentEmployee->department->name}}
                            @endforeach
                        </td>
                        <td><a href='employees/{{$employee->id}}/edit' class='btn btn-primary'>{{__('employee.update')}}</a></td>
                        <td>
                            <form method="POST" action="{{route('employees.destroy', $employee->id)}}">
                                    @method('DELETE')    
                                    @csrf
                                    <button class='btn btn-danger'>{{__('employee.delete')}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach   
                </tbody>
                @if($employees->hasPages())
                <tfoot>
                    <tr>
                        <td>
                            {{$employees->links()}}
                        </td>
                    </tr>
                </tfoot>
                @endif
            @else
                <tbody>
                    <tr>
                        <td colspan="8" class="text-center">
                            Нет сотрудников
                        </td>
                    </tr>    
                </tbody>
            @endif
        </table>
    </div>
@endsection