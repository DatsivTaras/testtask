@extends('layouts.app')

@section('content')
    <div class='container'>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form  method="POST" action="{{route('employees.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">{{__('employee.name')}} *</label>
                        <input value="{{old('name')}}" name='name' type="text" class="form-control">
                        @error('name')
                            <h7 style='color:red'>{{$message}}</h7>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">{{__('employee.surname')}} *</label>
                        <input value="{{old('surname')}}" name='surname' type="text" class="form-control" >
                        @error('surname')
                            <h7 style='color:red'>{{$message}} </h7>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{__('employee.patronymic')}}</label>
                        <input value="{{old('patronymic')}}" name='patronymic' type="text" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">{{__('employee.sex')}}</label>
                        <select name='sex' class="form-select" aria-label="Default select example">
                            <option value="" disabled selected>{{__('employee.sexes')}}</option>
                            @foreach($sexes as $key => $sex)
                                <option {{old('sex') == $key ? 'selected':' '}}  value="{{$key}}">{{$sex}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">{{__('employee.salary')}}</label>
                        <input name='salary' type="number" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">{{__('department.departments')}}</label>
                        <select name='departments[]' id='department' multiple class="form-control" >
                            @foreach($departments as $department)
                                <option  value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                        @error('departments')
                            <h7 style='color:red'>{{$message}} </h7>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('employee.save')}}</button>
                </form>
            </div>    
        </div>    
    </div>    

    <script>
        var EmployeeEdit = {
            init: function() {
                $('#department').multiselect({
                    nonSelectedText: 'Выберите отдел'
                });
            }
        }
        $(function() {
            EmployeeEdit.init();
        });
    </script>
@endsection