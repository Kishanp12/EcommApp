@extends('layout.app')

@section('content')
{{$inventories->total()}}
<br>
<form action="{{route('getInventory')}}" method="GET">
    <input type="text" name="search" placeholder="search"/>
</form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">SKU</th>
            <th scope="col">Quantity</th>
            <th scope="col">Color</th>
            <th scope="col">Size</th>
            <th scope="col">Price</th>
            <th scope="col">Cost</th>
            <th scope="col">ProductID</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
          <tr>
            <th scope="row">{{$inventory->product->product_name}}</th>
            <td>{{$inventory->sku}}</td>
            <td>{{$inventory->quantity}}</td>
            <td>{{$inventory->color}}</td>
            <td>{{$inventory->size}}</td>
            <td>{{$inventory->price_cents}}</td>
            <td>{{$inventory->cost_cents}}</td>
            <td>{{$inventory->product_id}}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        {{$inventories->links()}}
        </tfoot>
      </table>
@endsection