@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')


<div class="container ms-m15">
    <table class="table my-4">
        @foreach($materials as $mat)
            <tr>
                <td><a class="small" href="{{route('read_mat', [$mat->name])}}">{{$mat->name}}</a></td>
                <td><a class="small" href="{{route('download_mat', [$mat->name])}}">скачать</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
