@extends('layout.app')

@section('content')
  <a href="/products/create">Create</a>
    <table class="table table-striped table-dark">
      <br>
      <br>

        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Style</th>
            <th scope="col">Brand</th>
            <th scope="col">SKU</th>
          </tr>
        </thead>

      @foreach ($products as $product)
        <tbody>
          <tr>
            <th scope="row">{{$product->product_name}}</th>
            <td>{{$product->style}}</td>
            <td>{{$product->brand}}</td>
            <td>{{$product->inventories->implode('sku',',')}}
              <div>
              <a href="/products/{{$product->id}}/edit">Edit</a>
            </div>
              <div>
                  <form action="{{route('products.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                  <button>Delete</button>
                </form>
              </div>
            </td>
          </tr>
        </tbody>
      @endforeach
    </table>   


  <div>
    {{$products->links()}}
  </div>
@endsection