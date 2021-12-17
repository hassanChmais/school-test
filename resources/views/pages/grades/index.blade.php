@extends('layouts.master')
@section('css')

@section('title')
    {{trans('main_trans.Grades')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{trans('main_trans.Grades')}}</h4>
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
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Button trigger modal -->

<a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary">
<i class="fa fa-plus pr-2"> {{trans('main_trans.Grades_Add')}}</i>
</a>


<!-- Modal Add-->
                        <div class="modal" tabindex="-1" role="dialog" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.Grades_Add')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
        <form method="POST" action="{{ route('add_grade') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Names')}} : </h4></label>
             <input class="form-control form-white" type="text" name="grade_name" />
               </div>

                           <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Names_ar')}} : </h4></label>
             <input class="form-control form-white" type="text" name="grade_name_ar" />
               </div>

     <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Notes')}} : </h4></label>
             <textarea class="form-control" type="text" name="notes" rows="3"></textarea>
               </div>
                                            </div>
                                        
                                    </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('main_trans.Close')}}</button>

<input type="submit" value="{{trans('main_trans.Add')}}" class="btn btn-primary">
                                    </div></form>
                                </div>
                            </div>
                        </div> <!-- end Modal Add -->


<div class="table-responsive-stack"><div style="overflow-x:auto;">
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
          <th scope="col">{{trans('main_trans.Grades_Names')}}</th>
          <th scope="col"> {{trans('main_trans.Grades_Notes')}}</th>
          <th scope="col"> #</th>
          <th scope="col"> #</th>
          
         
 <!--  <th scope="col"><i class="fas fa-upload"></i> </th> -->
      </tr>
  </thead>
  <tbody>
@foreach($grades as $g)
     <tr>

      <th >{{$g->Name}}</th>
      
      <th >{{$g->Notes}}</th>
      

      <th  style="text-align:center"> 

<a href="#" data-toggle="modal" data-target="#update-grade{{$g->id}}" class="btn btn-primary ">{{trans('main_trans.Update')}}</a>
</th>
     <th><a href="#" data-toggle="modal" data-target="#delete-grade{{$g->id}}" class="btn btn-danger">{{trans('main_trans.Delete')}}</a></th>
</tr>

<!-- Modal Update-->
        <div class="modal" tabindex="-1" role="dialog" id="update-grade{{$g->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.Grades_Add')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
        <form method="POST" action="{{ route('update_grade') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Names')}} : </h4></label>
             <input class="form-control form-white" type="text" name="grade_name" value="{{$g->getTranslation('Name','en')}}" />
             <input id="id" type="hidden" name="id" class="form-control" value="{{$g->id}}" />
               </div>

                           <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Names_ar')}} : </h4></label>
             <input class="form-control form-white" type="text" name="grade_name_ar" value="{{$g->getTranslation('Name','ar')}}" />
               </div>

     <div class="col-md-12">
             <label class="control-label"><h4>{{trans('main_trans.Grades_Notes')}} : </h4></label>
             <textarea class="form-control" type="text" name="notes" rows="3">{{$g->Notes}}</textarea>
               </div>
                                            </div>
                                        
                                    </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('main_trans.Close')}}</button>

<input type="submit" value="{{trans('main_trans.Update')}}" class="btn btn-primary">
                                    </div></form>
                                </div>
                            </div>
                        </div>


<!-- end Modal Update -->
<!-- Modal Delete-->
        <div class="modal" tabindex="-1" role="dialog" id="delete-grade{{$g->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
<!--                                     <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.Grade_Delete')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div> -->
        <form method="POST" action="{{ route('delete_grade') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
                <h5 class="modal-title">{{trans('main_trans.Grade_Delete')}}</h5>
             <input id="id" type="hidden" name="id" class="form-control" value="{{$g->id}}" />
               </div>

                                            </div>
                                        
                                    </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-info" data-dismiss="modal">{{trans('main_trans.Close')}}</button>

<input type="submit" value="{{trans('main_trans.Delete')}}" class="btn btn-danger">
                                    </div></form>
                                </div>
                            </div>
                        </div>


<!-- end Modal Delete -->

@endforeach

</tbody>

</table>

<hr style="border: 1px solid #169cd9;" >

</div></div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
