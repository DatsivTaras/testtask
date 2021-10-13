@extends('layouts.app')

@section('content')
    <div class='container'>
        <h3 align='center'>{{__('department.updateDepartment')}}</h3>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="POST" action="{{route('departaments.update', $departament->id)}}">
                    @method('PUT')    
                    @csrf
                    <div class="mb-4">
                        <label  class="form-label">{{__('department.name')}} *</label>
                        <input value="{{ empty(old('name')) ? $departament->name : old('name')}}" name='name' type="text" class="form-control">
                        @error('name') 
                            <h7 style='color:red'>{{$message}}</h7>
                        @enderror
                    </div>

                    <div align='center'>
                        <button type="submit" class="btn btn-primary">{{__('department.adding')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection