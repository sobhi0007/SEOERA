
@extends('layouts.admin')

@section('content')
 <div class="container bg-light p-5">
  @if(session()->has('msg'))
  <div class="alert alert-success" role="alert">
      {{Session::get('msg')}}
  </div> 
  @endif 
   <div class="row mb-2">
      <div class="col-8">
         <div class="display-4">LANGUAGES</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url('dashboard/languages/create')}}" class="btn btn-sm btn-primary text-light">Add language</a>
      </div>
   </div>
  

  <table class="table table-striped ">
   <thead class="bg-dark text-light">
     <tr>
       <th scope="col">Image</th>
       <th scope="col">Title</th>
       <th scope="col">Slogan</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
  
    @forelse ($languages as $language)
    <tr>
      <th scope="row"><img style="width: 30px;" src="{{asset($language->image)}}" title="{{$language->title}}" ></th>
      <td>{{$language->title}}</td>
      <td>{{$language->slogan}}</td>
      <td>
        <form action="{{url('dashboard/languages/'.$language->id)}}" method="POST">
          @csrf
          @method('Delete')
          <a href="{{url('dashboard/languages/'.$language->id.'/edit')}}" class="btn btn-sm btn-primary text-light">Update</a>
          <input type="submit" value="Delete" class="btn btn-sm btn-danger text-light">
        </form>
      </td>
    </tr>
    @empty
      </tbody>
      </table>
      

      <div class="text-center mt-3">
        <p>No records to show</p>
      </div>
    @endforelse
   
   </tbody>
 </table>
 <div class="d-flex justify-content-center mt-3"> {{ $languages->links('pagination::bootstrap-4')}}</div>
 </div>
@endsection