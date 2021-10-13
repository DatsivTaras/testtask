@extends('layouts.app')

@section('content')

<div class='container'>
    <div align='right'>
        <a href='{{route("departaments.create")}}' class='btn btn-success'>+ {{__('department.departments')}}</a>
    </div>
    <h3 align='center'>{{__('department.departments')}}</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">{{__('employee.name')}}</th>
                <th scope="col">{{__('employee.countsEmployees')}}</th>
                <th scope="col">{{__('employee.maxSalaryEmployee')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departaments as $departament)    
                <tr>
                    <td>{{$departament->name}}</td>
                    <td>{{$departament->getEmployeesCount()}}</td>
                    <td>{{$departament->getMaxEmployeeSalary()}}</td>
                    <td>
                        <a href='{{route("departaments.edit", $departament->id)}}' class='btn btn-primary'>{{__('department.update')}}</a>
                    </td>
                    <td>
                    @if($departament->getEmployeesCount() == 0 ? 'disabled' : '')    
                        <form method="POST" action="{{route('departaments.destroy', $departament->id)}}">
                            @method('DELETE')    
                            @csrf
                            <button class='btn btn-danger' {{$departament->getEmployeesCount() !== 0 ? 'disabled' : ''}}>{{__('department.delete')}}</button>
                        </form>
                    @else   
                            <button class='btn btn-danger' {{$departament->getEmployeesCount() !== 0 ? 'disabled' : ''}}>{{__('department.delete')}}</button>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$departaments->links()}}

@endsection