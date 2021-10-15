@extends('layouts.app')

@section('content')

 <div class='container'>
    <h3 align='center'>{{__('department.employeeInDepartment')}}</h3>    
    @if(($employees->total() > 0) || ($departments->count() > 0))
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th></th>
                @foreach($departments as $department)      
                    <th scope="col">{{$department->name}}</th>
                @endforeach
            </tr>
        </thead>
        @if($employees->total() > 0)
            <tbody>
            @foreach($employees as $employee)            
                <tr>
                    <td>{{$employee->getFullName()}}</td>
                    @foreach($departments as $department)
                        <td>
                            @if($employee->inDepartment($department->id))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        {{$employees->links()}}
                    </td>
                </tr>
            </tfoot>
        @else
            <tbody>
                <tr>
                    <td colspan="{{$departments->count() + 1}}">
                        Нет сотрудников
                    </td>
                </tr>    
            </tbody>
        @endif
    </table>
    @else
        <p class="text-center">Записей пока нет</p>
    @endif
 </div>

@endsection 