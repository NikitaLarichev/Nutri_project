@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')

<div class="container ms-mt100px">
    <div class="container">
        @foreach($products as $product)
            @if($product->client_id == $client->id)
                @if($product->end_date != null)
                <div class="my-2">
                    <div style="color:gray">{{App\Models\Product::firstWhere('id', $product->product_id)->name}}</div>
                    <div class="small" style="color:gray">{{$product->start_date}}&#160;-&#160;{{$product->end_date}}</div>
                </div>
                @else
                <div class="my-2">
                    <div>{{$product->name}}</div>
                    <div class="small">{{$product->start_date}} - ...</div>
                </div>
                @endif
            @endif
        @endforeach
    </div>     
</div>

@endsection
