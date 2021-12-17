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
        @if (App::getLocale() == 'en')
    <input id="lang" type="hidden" value="english">
@else
    <input id="lang" type="hidden" value="arabic">
@endif
<div id="fname" class="{{route('ajax')}}"></div>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-header"><h5 class="modal-title">{{trans('main_trans.section_update')}}</h5></div>
            <div class="card-body">
                <!-- Modal Update -->
                @foreach($section as $s)
        <form method="POST" action="{{route('update_section',$s->id)}}" enctype="multipart/form-data">
                                    <div class="modal-body p-20">
    @csrf
          <div class="row">
            <div class="col-md-6">
             <label class="control-label"><h4>{{trans('main_trans.section_name')}} : </h4></label>
             <input class="form-control form-white" type="text" name="section_name" value="{{$s->getTranslation('section_name','en')}}" />
               </div>

                           <div class="col-md-6">
             <label class="control-label"><h4>{{trans('main_trans.section_name_ar')}} : </h4></label>
             <input class="form-control form-white" type="text" name="section_name_ar" value="{{$s->getTranslation('section_name','ar')}}" />
               </div>

                           <div class="col-md-12">
                
                <label class="control-label">Choose Grade</label>
                
                <select class="form-control form-white hassan" data-placeholder="Choose a color..." name="grade_id" id="GradeSelector" onchange="myFunction()">
                    
                    @foreach($grades as $g)
                    <option value="{{$g->id}}" {{ ($s->grade_id == $g->id) ? 'selected' : '' }}>{{$g->Name}}</option>
                    @endforeach
                </select></div>
               

                           <div class="col-md-12">
                
                <label class="control-label">Choose Class</label>
                <select class="form-control form-white" data-placeholder="Choose a color..." name="class_id" id="ClassSelector" >
                    <option value="{{$s->class_id}}"></option>
                </select></div>
                                            </div>
                                        
                                    </div>
   


<input type="submit" value="{{trans('main_trans.Add')}}" class="btn btn-primary">
                                    </form>
@endforeach
<!-- End Modal update -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

myFunction();
    function myFunction() {


    var z = document.querySelector('#GradeSelector').value ; 
    
   
  
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
var slctd = document.getElementById("ClassSelector").value;
removeAllChildNodes(container);

  const myObj = JSON.parse(this.responseText);
  for (let x in myObj) {
  var option = document.createElement("option");
    option.value=myObj[x].id;
    //console.log(slctd);
   if(slctd == myObj[x].id){
    option.selected = "true";
}
    if(document.getElementById("lang").value  == "english"){
    option.text=myObj[x].Name_class.en;}
    else{
        option.text=myObj[x].Name_class.ar;
    }
    container.add(option);
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