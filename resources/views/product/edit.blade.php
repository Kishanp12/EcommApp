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

    <div>
        <form action="{{route('products.update' , [$product])}}" method="post">
            @csrf
            @method('PUT')
            
            <input type="text" name='product_name' value="{{$product->product_name}}"/>
            <br>
            <input type="text" name='description' value="{{$product->description}}"/>
            <br>
            <input type="text" name='style' value="{{$product->style}}"/>
            <br>
            <input type="text" name='brand' value="{{$product->brand}}"/>
            <br>
            <input type="text" name='product_type' value="{{$product->product_type}}"/>
            <br>
            <input type="text" name='shipping_price' value="{{$product->shipping_price}}"/>
            <br>
            <input type="text" name='note' value="{{$product->note}}" placeholder="Note"/>
            <br>
            <input type="text" name='url' value="{{$product->url}}" placeholder="URL"/>
            <br>
            <input type="submit" value="Update">
        </form>
    </div>
        <br>
        <a href="/products">Back</a>

@endsection