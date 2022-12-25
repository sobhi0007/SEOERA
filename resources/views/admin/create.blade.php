
@extends('layouts.admin')

@section('content')
 <div class="container bg-light p-5">
   <div class="row mb-2">
      <div class="col-8">
         <h2>Create Admin</h2>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url()->previous()}}" class="btn btn-sm btn-danger text-light">Back</a>
      </div>
   </div>
   <div class=" my-3 ">
    <form method="POST" action="{{url('dashboard/admins/')}}" >
       @csrf
       @method('POST')
       <div class="row">
          <div class="col-6 my-2"> 
             <label for="name">Name</label>
             <input  type="text" class="rounded @error('name') is-invalid  @enderror form-control form-control-sm" id="name" name="name" value="{{ old('name') }}">
          @error('name')
             <small class="fw-bold   text-danger">{{ $message }}</small>
          @enderror
          </div>
          <div class="col-6 my-2"> 
             <label for="email">Email</label>
             <input  type="email" class="rounded @error('email') is-invalid @enderror form-control form-control-sm" id="email" name="email" value="{{ old('email') }}">
          @error('email')
             <small class="fw-bold   text-danger">{{ $message }}</small>
          @enderror
          </div>
        <div class="col-6 my-2"> 
            <label for="password">Password</label>
            <input  type="password" class="rounded @error('password') is-invalid @enderror form-control form-control-sm" id="password" name="password" value="{{ old('password') }}">
         @error('password')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>

         <div class="col-6 my-2"> 
            <label for="language">language</label>
            <select class="form-select" name="language" aria-label="Default select example">
                @foreach ($languages as $lang)
                    <option value="{{$lang->id}}" {{ old('language')==$lang->id?'selected':'' }}>{{$lang->title}} </option>
                @endforeach
              </select>  
               @error('language')
            <small class="fw-bold   text-danger">{{ $message }}</small>
         @enderror
         </div>

       </div>
       <div class="text-end">
          <button type="submit" class="btn btn-primary btn-sm text-light my-2 ">Submit</button>
       </div>
       
     </form>
</div>
@endsection