@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Teacher/Section</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
       <div class="col-md-12" style="padding-right:18%;padding-left: 18%">
        @if (count($errors) > 0)
        <div class="alert alert-danger" >
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <p class="alert alert-success">{{Session('success')}}</p>
        @endif

    </div> 
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form method="POST" action="{{route('AddTeacherSection')}}" enctype="multipart/form-data">
                             @csrf
                            
                            <div class="row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('main_trans.Teachers')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="teacher_id" required>
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}">{{$teacher->name_teacher}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
               <div class="row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('main_trans.Section')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="section_id" required>
                                        @foreach($sections as $section)
                                            <option value="{{$section->id}}">
{{$section->Classes->Name_class}}/
                                                {{$section->section_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

<br>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.Add')}}</button>
                    </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
