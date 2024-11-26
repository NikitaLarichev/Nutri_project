@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')

<div class="container ms-mt100px">
    <div class="container">
        @foreach($products as $product)
            @if($product->client_id == $user->id)
                @if($product->end_date != null)
                    <div style="color:gray">{{$product->name}}</div>
                    <div class="small" style="color:gray">{{$product->start_date - $product->end_date}}</div>
                @else
                    <div>{{$product->name}}</div>
                    <div class="small">{{$product->start_date}} - ...</div>
                @endif
            @endif
        @endforeach
    </div>     
</div>

@endsection
