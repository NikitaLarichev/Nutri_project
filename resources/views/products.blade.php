@extends('layouts.app')
@section('menu')
@parent
@endsection
@section('content')

<div>
    <main>
        <div class="c1 prodFont">
            <div>
                @livewire('products-component', ['products'=>$products])
            </div>
            @if(Auth::check())
                @if(Auth::user()->role == 'admin')
                    <form class="ms-5" method="post" enctype="multipart/form-data" action="{{route('create_product')}}">
                        @csrf
                        <label class="form-label my-2 mx-4" for="name" >Название:</label>
                        <input class="form-control my-2 mx-4 w-50" id="name" type="text" name="name"/>
                        @error('name')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                        @enderror
                        <label class="form-label my-2 mx-4" for="short_desc" >Короткое описание:</label>
                        <input class="form-control my-2 mx-4 w-50" id="short_desc" type="text" name="short_desc"/>
                        @error('short_desc')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                        @enderror
                        <label class="form-label my-2 mx-4" for="desc" >Полное описание:</label>
                        <textarea class="form-control my-2 mx-4 w-50" id="desc" type="textarea" name="description"></textarea>
                        @error('description')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                        @enderror
                        <label class="form-label my-2 mx-4" for="price" >Цена:</label>
                        <input class="form-control my-2 mx-4 w-50" id="price" type="number" name="price"/>
                        @error('price')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                        @enderror
                        <label class="form-label my-2 mx-4" for="img" >Изображение:</label>
                        <input class="form-control my-2 mx-4 w-50" id="img" type="file" name="imgFile" multiple/>
                        @error('imgFile')
                        <div class="alert alert-danger w-25">{{ $message }}</div>
                        @enderror
                        <input class="btn c3 button-outline my-2 mx-4" type="submit" value="Добавить услугу"/>
                    </form>
                @endif
            @endif
        <div>
    <script src="{{asset('js/index.js')}}"></script>
</div>
@endsection