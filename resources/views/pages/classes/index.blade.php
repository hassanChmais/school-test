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
            <h4 class="mb-0"> {{trans('main_trans.Class')}}</h4>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<script type="text/javascript">
    
    function MyFunction(){

        var i = document.getElementsByClassName("test").length;
        var e = document.createElement("DIV");
        e.innerHTML = "<div class='row test'><div class='col-md-4'><label class='control-label'>{{trans('main_trans.Class_Names_ar')}}</label><input class='form-control form-white' placeholder='Enter name' type='text' name='name_ar["+i+"]' /></div><div class='col-md-4'><label class='control-label'>{{trans('main_trans.Class_Names')}}</label><input class='form-control form-white' placeholder='Enter name' type='text' name='name["+i+"]' /></div><div class='col-md-4'><label class='control-label'>Choose Grade</label><select class='form-control form-white' data-placeholder='Choose a Grade...' name='grade_id["+i+"]'>@foreach($grades as $g)<option value='{{$g->id}}'>{{$g->Name}}</option>@endforeach</select></div></div>";
        document.getElementById("myDIV").appendChild(e);
    }
</script>
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
<a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary">
<i class="fa fa-plus pr-2"> {{trans('main_trans.Class_Add')}}</i>
</a>
<a href="#" id="btn_delete_all" class="btn btn-danger" onclick="showModal()">
<i class="fa pr-2"> {{trans('main_trans.Class_delete')}}</i>
</a>
<span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span>
        <!-- Modal Add Category -->
            <div class="modal" tabindex="-1" role="dialog" id="add-category">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Add a Class</h5>
            <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
            </div>
            
            <form method="POST" action="{{ route('add_class') }}" enctype="multipart/form-data">
                <div class="modal-body p-20">
                    @csrf
                <div class="row test">
                <div class="col-md-4">
                <label class="control-label">{{trans('main_trans.Class_Names_ar')}}</label>
                <input class="form-control form-white" placeholder="Enter name"type="text" name="name_ar[0]" /></div>
                <div class="col-md-4">
                <label class="control-label">{{trans('main_trans.Class_Names')}}</label>
                <input class="form-control form-white" placeholder="Enter name"type="text" name="name[0]" /></div>
                <div class="col-md-4">
                <label class="control-label">Choose Grade</label>
                <select class="form-control form-white" data-placeholder="Choose a color..." name="grade_id[0]">
                    @foreach($grades as $g)
                    <option value="{{$g->id}}">{{$g->Name}}</option>
                    @endforeach
                </select></div></div>
                <div id="myDIV"></div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <input type="submit" value="{{trans('main_trans.Add')}}" class="btn btn-primary">
           <button type="button" class="btn btn-success" onclick="MyFunction()">Add more classes</button>
            </div></form>
                                </div>
                            </div>
                        </div> 
            <!-- End Create Modal-->
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

<div class="table-responsive-stack"><div style="overflow-x:auto;">
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
          <th scope="col"><input type="checkbox" name="select-all" id="example-select-all" onclick="check_all('box1',this)" /></th></th>
          <th scope="col">{{trans('main_trans.Class_Names')}}</th>
          <th scope="col"> {{trans('main_trans.Grades_Names')}}</th>
          <th scope="col"> #</th>
          <th scope="col"> #</th>
          
         
 <!--  <th scope="col"><i class="fas fa-upload"></i> </th> -->
      </tr>
  </thead>
  <tbody>
@foreach($classes as $class)
     <tr>
    <th><input  class="box1" type="checkbox" name="check[]" value="{{$class->id}}" /></th>
      <th >{{$class->Name_class}}</th>
      
      <th >
          @foreach($grades as $grade)
          @if($grade->id == $class->Grade_id)   
          {{$grade->Name}}
          @endif
          @endforeach
      </th>
      

      <th  style="text-align:center"> 

<a href="#" data-toggle="modal" data-target="#update-class{{$class->id}}" class="btn btn-primary ">{{trans('main_trans.Update')}}</a>
</th>
     <th><a href="#" data-toggle="modal" data-target="#delete-class{{$class->id}}" class="btn btn-danger">{{trans('main_trans.Delete')}}</a></th>
</tr>
<!-- Modal Update-->
        <div class="modal" tabindex="-1" role="dialog" id="update-class{{$class->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.Class_Add')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
        <form method="POST" action="{{ route('update_class') }}" enctype="multipart/form-data">
                    <div class="modal-body p-20">
                    @csrf
                <div class="row test">
                <div class="col-md-4">
                <label class="control-label">{{trans('main_trans.Class_Names_ar')}}</label>
                <input class="form-control form-white" type="text" name="name_ar" value="{{$class->getTranslation('Name_class','ar')}}" />
<input type="hidden" name="id" class="form-control" value="{{$class->id}}" />
                </div>
                <div class="col-md-4">
                <label class="control-label">{{trans('main_trans.Class_Names')}}</label>
                <input class="form-control form-white" type="text" name="name" value="{{$class->getTranslation('Name_class','en')}}"/></div>
                <div class="col-md-4">
                <label class="control-label">Choose Grade</label>
                <select class="form-control form-white" data-placeholder="Choose a color..." name="grade_id" >
                    @foreach($grades as $g)
                    <option value="{{$g->id}}" {{ ($class->Grade_id == $g->id) ? 'selected' : '' }}>{{$g->Name}}</option>
                    @endforeach
                </select></div></div>
                
            
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
        <div class="modal" tabindex="-1" role="dialog" id="delete-class{{$class->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
        <form method="POST" action="{{ route('delete_class') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
                <h5 class="modal-title">{{trans('main_trans.Class_Delete')}}</h5>
             <input type="hidden" name="id" class="form-control" value="{{$class->id}}" />
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
<!-- Modal Delete All-->
        <div class="modal" tabindex="-1" role="dialog" id="demo">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.Class_Delete')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
        <form method="POST" action="{{ route('delete_all') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
                <h5 class="modal-title">{{trans('main_trans.Class_Delete')}}</h5>
             <input id="all_id" type="hidden" name="id" class="form-control" value="" />
               </div>

                                            </div>
                                        
                                    </div>
   <div class="modal-footer">
<button type="button" class="btn btn-info" onclick="hidde()">{{trans('main_trans.Close')}}</button>

<input type="submit" value="{{trans('main_trans.Delete')}}" class="btn btn-danger">
                                    </div></form>
                                </div>
                            </div>
                        </div>


<!-- end Modal Delete -->

<hr style="border: 1px solid #169cd9;" >

</div></div>
            </div>
        </div>
    </div>
</div>
<script>
    function check_all(className,elem){
        var elements = document.getElementsByClassName(className);
var l = elements.length ;
if(elem.checked){
    for(var i=0 ;i< l ;i++){
        elements[i].checked = true ;
    }
    }else{
           for(var i=0 ;i< l ;i++){
        elements[i].checked = false ;
    } 
    }
}
function showModal(){
var x=document.getElementById("demo");
var all = document.getElementById("all_id");
var elem = document.getElementsByClassName("box1");
var j = elem.length;
for(i = 0 ;i<j;i++){
if(elem[i].checked){
x.style.display = "block";
if(i==0){
   all.value =  elem[i].value ;
}else{
all.value = all.value +","+ elem[i].value;
}
    }
}
 
    }
function hidde(){
 var x=document.getElementById("demo");
  x.style.display = "none";  
}

</script>
<!-- row closed -->
@endsection
@section('js')

@endsection
