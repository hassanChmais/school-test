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
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
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
   
    <div class="table-responsive">
           <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
         <thead>
             <tr>
               <th>#</th>
                  <th>{{trans('main_trans.Name_Teacher')}}</th>
                      <th>{{trans('main_trans.Joining_Date')}}</th>
                         <th>{{trans('main_trans.specialization')}}</th>
                         <th>العمليات</th>
                                        </tr></thead><tbody>
              
              
                        <tr>
                         
                         <td></td>
                         <td></td>
                           <td></td>
                           <td></td>
        <td><a href="#" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{  }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

         <div class="modal fade" id="delete_Teacher{{}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <form action="" method="GET">
          @csrf
         <div class="modal-content">
         <div class="modal-header">
          <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('main_trans.Delete_Teacher') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button></div>
         <div class="modal-body">
          <p> {{ trans('main_trans.Warning_Grade') }}</p>
          <input type="hidden" name="id"  value=""></div>
         <div class="modal-footer">
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.Close') }}</button>
          <button type="submit" class="btn btn-danger">{{ trans('main_trans.Delete') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        
                                    </table>
                                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
<!--         -->