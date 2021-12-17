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
            <h4 class="mb-0"> Update Teachers</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
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
                            
            <form method="POST" action="{{route('updateTeacher',$teacher->id)}}" enctype="multipart/form-data">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('main_trans.Email')}}</label>
                                    <input type="email" name="email" class="form-control" value="{{$teacher->Email}}">
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('main_trans.Password')}}</label>
                                    <input type="password" name="password" class="form-control" value="{{$teacher->Password}}">
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{trans('main_trans.Name_ar')}}</label>
                                    <input type="text" name="name_ar" class="form-control" value="{{$teacher->getTranslation('name_teacher','ar')}}">
                                </div>
                                <div class="col">
                                    <label for="title">{{trans('main_trans.Name_en')}}</label>
                                    <input type="text" name="name_en" class="form-control" value="{{$teacher->getTranslation('name_teacher','en')}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="inputCity">{{trans('main_trans.specialization')}}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="special_id" required>
                                        @foreach($specializations as $specialization)
                                            <option value="{{$specialization->id}}" {{ ($teacher->Specialization_id == $specialization->id) ? 'selected' : '' }}>{{$specialization->name_special}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col">
                                    <label for="title">{{trans('main_trans.Joining_Date')}}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action" name="date" data-date-format="yyyy-mm-dd" value="{{$teacher->Joining_Date}}" >
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="group">
                                <label for="exampleFormControlTextarea1">{{trans('main_trans.Address')}}</label>
                                <textarea class="form-control" name="address"
                                          id="exampleFormControlTextarea1" rows="4">{{$teacher->Address}}</textarea>
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.Update')}}</button>
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

