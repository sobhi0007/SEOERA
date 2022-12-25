
@extends('layouts.admin')

@section('content')
 <div class="container bg-light p-5">
   <div class="row mb-2">
      <div class="col-8">
         <div class="display-4">CREATE LANGUAGE</div>
       
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
   <div class=" my-3 ">
    <form method="POST" action="{{url('dashboard/languages/'.$language->id)}}"  enctype="multipart/form-data">
       @csrf
       @method('PUT')
       <div class="row">
         <div class="col-6 my-2"> 
            <label for="title">Title</label>
            <input  type="text" class="rounded @error('title') is-invalid  @enderror form-control form-control-sm" id="title" name="title" value="{{ $language->title}}">
         @error('title')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>
         <div class="col-6 my-2"> 
          <label for="slogan">Slogan</label>
          <input  type="text" class="rounded @error('slogan') is-invalid  @enderror form-control form-control-sm" id="slogan" name="slogan" value="{{ $language->slogan }}">
       @error('slogan')
          <small class="fw-bold   text-danger">{{ $message }}</small>
       @enderror
       </div>
         <div class="col-12 my-2"> 
            <label for="image">Image</label>
            <input  type="file" class="rounded @error('image') is-invalid @enderror form-control form-control-sm" id="image" name="image" >
         @error('image')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         <img src="{{asset($language->image)}}" style="width: 30px">
         </div>
         <div class="form-check col-12 my-2 mx-3"> 

  </div>
  <div class="text-end">
     <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
  </div>
     </form>
</div>
@endsection