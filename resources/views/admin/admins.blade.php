
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
         <div class="display-4">ADMINS</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url('dashboard/admins/create')}}" class="btn btn-sm btn-primary text-light">Add Admin</a>
      </div>
   </div>
  

  <table class="table table-striped ">
   <thead class="bg-dark text-light">
     <tr>
       <th scope="col">Language</th>
       <th scope="col">Name</th>
       <th scope="col">Email</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
  
    @forelse ($admins as $admin)
    <tr>
      <th scope="row"><img style="width: 30px;" src="{{asset($admin->language['image'])}}" title="{{$admin->language['title']}}" ></th>
      <td>{{$admin->name}}</td>
      <td>{{$admin->email}}</td>
      <td>
        <form action="{{url('dashboard/admins/'.$admin->id)}}" method="POST">
          @csrf
          @method('Delete')
          <a href="{{url('dashboard/admins/'.$admin->id.'/edit')}}" class="btn btn-sm btn-primary text-light">Update</a>
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
 <div class="d-flex justify-content-center mt-3"> {{ $admins->links('pagination::bootstrap-4')}}</div>
 </div>
@endsection