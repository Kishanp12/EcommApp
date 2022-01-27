@extends('layout.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
<form action="{{route('products.create')}}" method="post"> 
@csrf
    <input type="text" name='product_name' placeholder="Name"/>
    <br>
    <input type="text" name='description' placeholder="Description"/>
    <br>
    <input type="text" name='style' placeholder="Style"/>
    <br>
    <input type="text" name='brand' placeholder="Brand"/>
    <br>
    <input type="text" name='product_type' placeholder="Type"/>
    <br>
    <input type="number" name='shipping_price' placeholder="Shipping Price"/>
    <br>
    <input type="text" name='note' placeholder="Note"/>
    <br>
    <input type="url" name='url' placeholder="URL"/>
    <br>
    <input type="submit" name="Create">
    <br>
    <a href="/products">Back</a>

</form>

@endsection