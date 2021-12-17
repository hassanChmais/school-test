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
            <h4 class="mb-0"> {{trans('main_trans.Section')}}</h4>
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
<div id="fname" class="{{route('ajax')}}"></div>
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


<!-- card-statistics -->
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
          <div class="card-body">   
           <div class="card-title">
               <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-primary">
<i class="fa fa-plus pr-2"> {{trans('main_trans.section_add')}}</i>
</a>
           </div>
           @foreach($grades as $g)
           <div class="accordion">
              <div class="acd-group acd-active">
                  <a href="#" class="acd-heading">{{$g->Name}}</a>
<div class="table-responsive-stack"><div style="overflow-x:auto;">
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
          <th scope="col">{{trans('main_trans.Class_Names')}}</th>
          <th scope="col"> {{trans('main_trans.sect')}}</th>
          <th scope="col"> #</th>
          <th scope="col"> #</th>
          
         
 <!--  <th scope="col"><i class="fas fa-upload"></i> </th> -->
      </tr>
  </thead>
  @foreach($sections as $s)
  <tbody>
 @if($s->grade_id == $g->id)
     <tr>
             <th >
         {{$s->Classes->Name_class}}       
      </th>
              <th >
                {{$s->section_name}}
      </th>     

      <th  style="text-align:center"> 
<a href="{{ route('get_section',$s->id) }}" class="btn btn-primary ">{{trans('main_trans.Update')}}</a>
</th>
     <th><a href="#" data-toggle="modal" data-target="#delete-section{{$s->id}}" class="btn btn-danger">{{trans('main_trans.Delete')}}</a></th>
     
</tr>
@endif
                         

<!-- Modal Delete-->
        <div class="modal" tabindex="-1" role="dialog" id="delete-section{{$s->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
        <form method="POST" action="{{ route('delete_section') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-12">
                <h5 class="modal-title">{{trans('main_trans.section_delete')}}</h5>
             <input type="hidden" name="id" class="form-control" value="{{$s->id}}" />
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
          @endforeach
          </div>
        </div>   
      </div>
      <!-- end card-statistics -->




<!-- Modal Add-->
                        <div class="modal" tabindex="-1" role="dialog" id="add-category">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{trans('main_trans.section_add')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
        <form method="POST" action="{{ route('add_section') }}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-6">
             <label class="control-label"><h4>{{trans('main_trans.section_name')}} : </h4></label>
             <input class="form-control form-white" type="text" name="section_name" />
               </div>

                           <div class="col-md-6">
             <label class="control-label"><h4>{{trans('main_trans.section_name_ar')}} : </h4></label>
             <input class="form-control form-white" type="text" name="section_name_ar" />
               </div>

                           <div class="col-md-12">
                
                <label class="control-label">Choose Grade</label>
                <select class="form-control form-white" data-placeholder="Choose a color..." name="grade_id" id="GradeSelector" onchange="myFunction()">
                    
                    @foreach($grades as $g)
                    <option value="{{$g->id}}">{{$g->Name}}</option>
                    @endforeach
                </select></div>
               <div id="loading" class="col-md-12" style="display: none;color: red;">
                   <div class="spinner-border" >
  <span class="visually-hidden">Loading...</span>
</div>
               </div>

                           <div class="col-md-12">
                
                <label class="control-label">Choose Grade</label>
                <select class="form-control form-white" data-placeholder="Choose a color..." name="class_id" id="ClassSelector" >
                </select></div>
                                            </div>
                                        
                                    </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">{{trans('main_trans.Close')}}</button>

<input type="submit" value="{{trans('main_trans.Add')}}" class="btn btn-primary">
                                    </div></form>
                                </div>
                            </div>
                        </div>
                         <!-- end Modal Add -->

                        

    </div>
</div>
<script type="text/javascript">

myFunction();
    function myFunction() {


    var z = document.getElementById('GradeSelector').value ; 
document.getElementById('loading').style.display = "block";
   
  
  //console.log(str);
  //beforeSend();
   var ajax = new XMLHttpRequest();
  ajax.onload = function() {

  function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

const container = document.querySelector('#ClassSelector');
removeAllChildNodes(container);
var select = document.getElementById("ClassSelector");


  const myObj = JSON.parse(this.responseText);
  for (let x in myObj) {
  var option = document.createElement("option");
    option.value=myObj[x].id;
    if(document.getElementById("lang").value  == "english"){
    option.text=myObj[x].Name_class.en;}
    else{
        option.text=myObj[x].Name_class.ar;
    }
    document.getElementById('loading').style.display = "none";
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
