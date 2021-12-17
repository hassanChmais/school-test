@extends('layouts.master')
@section('css')

@section('title')
    Student
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Student</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
@if (App::getLocale() == 'en')
    <input id="lang" type="hidden" value="english">
@else
    <input id="lang" type="hidden" value="arabic">
@endif
<div id="fname" class="{{route('student_ajax')}}"></div>
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
<form method="POST"  action="{{route('addStudent')}}" autocomplete="on" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('main_trans.personal_information')}}</h6><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main_trans.name_ar')}} :<span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main_trans.name_en')}} :<span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" type="text" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main_trans.Email')}} :<span class="text-danger">*</span></label>
                                    <input type="email"  name="email" class="form-control" >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('main_trans.Password')}} :<span class="text-danger">*</span></label>
                                    <input  type="password" name="password" class="form-control" >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bg_id">{{trans('main_trans.Blood_Type_Father_id')}}</label>
                                    <select class="custom-select mr-sm-2" name="blood_id">

                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                        @foreach($bloods as $b)
                                            <option value="{{$b->id}}">{{$b->blood_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('main_trans.Date_of_Birth')}} :<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd">
                                </div>
                            </div>

                        </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('main_trans.Student_information')}}</h6><br>
                    <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('main_trans.Grades_Names')}}</label>
                                    
                                    <select class="custom-select mr-sm-2" name="grade_id"
onchange="myFunction()" id="GradeSelector" 
                                    >
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                    @foreach($grades as $g)
                                        
                                        
                                            <option  value="{{$g->id}}">{{$g->Name}}</option>
                                       @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="section_id">{{trans('main_trans.Section')}}</label>
                                    <select class="custom-select mr-sm-2" name="section_id"
id="SectionSelector" 
                                    >

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="parent_id">{{trans('main_trans.Parents')}}</label>
                                    <select class="custom-select mr-sm-2" name="parent_id">
                                        <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                       @foreach($parents as $p)
                                            <option value="{{$p->id}}">{{$p->Name_Father}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{trans('Students_trans.academic_year')}}</label>
                                <select class="custom-select mr-sm-2" name="year">
                                    <option selected disabled>{{trans('main_trans.Choose')}}...</option>
                                                                           @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                   
                                </select>
                            </div>
                        </div>
                        </div><br>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="academic_year">Choose Image/s: <span class="text-danger">*</span></label>
                            <input type="file" accept="image/*" name="photos[]" multiple>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit" style="padding:10px;margin-right: 10px;letter-spacing: 1px;text-shadow: 1px 1px;">{{trans('main_trans.Add')}}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function myFunction(){
var z = document.getElementById('GradeSelector').value ; 
   var ajax = new XMLHttpRequest();
  ajax.onload = function() {

  function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

const container = document.querySelector('#SectionSelector');
removeAllChildNodes(container);
var select = document.getElementById("SectionSelector");
const myObj = JSON.parse(this.responseText);
  for (let x in myObj) {
  var option = document.createElement("option");
    option.value=myObj[x].id;
    if(document.getElementById("lang").value  == "english"){
    option.text=myObj[x].classes.Name_class.en +"/"+ myObj[x].section_name.en;}
    else{
        option.text=myObj[x].classes.Name_class.ar +"/"+myObj[x].section_name.ar;
    }
select.add(option);
  }

  }
  var url  = document.getElementById("fname").getAttribute("class"); 
  
 ajax.open("POST",url);
 
ajax.setRequestHeader('X-CSRF-Token', document.getElementsByTagName("meta")[0].getAttribute("content"));
var formData = new FormData();

formData.append('id' , z);


  ajax.send(formData);
    }
</script>
<!-- row closed -->
@endsection
@section('js')

@endsection
