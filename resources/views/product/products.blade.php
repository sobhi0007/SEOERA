
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
         <div class="display-4">PRODUCTS</div>
         <div class="line-shape bg-primary"></div>
      </div>
      <div class="col-4 text-end">
       <a href="{{url('dashboard/products/create')}}" class="btn btn-sm btn-primary text-light">Add product</a>
      </div>
   </div>
  

  <table class="table table-striped ">
   <thead class="bg-dark text-light">
     <tr>
       <th scope="col">Language</th>
       <th scope="col">Name</th>
       <th scope="col">Image</th>
       <th scope="col">Description</th>
       <th scope="col">Price</th>
       <th scope="col">Action</th>
     </tr>
   </thead>
   <tbody>
  
    @forelse ($products as $product)
    <tr>
      <th scope="row"><img style="width: 30px;" src="{{asset($product->language['image'])}}" title="{{$product->language['title']}}" ></th>
      <td>{{$product->name}}</td>
      <td><img style="width: 90px;height:90px" src="{{asset($product->image)}}" title="{{$product->name}}"></td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}} EGP</td>
      <td>
        <form action="{{url('dashboard/products/'.$product->id)}}" method="POST">
          @csrf
          @method('Delete')
          <a href="{{url('dashboard/products/'.$product->id.'/edit')}}" class="btn btn-sm btn-primary text-light">Update</a>
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
 <div class="d-flex justify-content-center mt-3"> {{ $products->links('pagination::bootstrap-4')}}</div>
 </div>
@endsection