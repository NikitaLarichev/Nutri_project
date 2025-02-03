@extends('layouts.account_menu', ['user'=>$user])
@section('menu')
@parent
@endsection
@section('account_content')


<div class="container my-4">
<h4 class="m-5">Список методических материалов</h4>
    <table class="c1">
        @foreach($materials as $mat)
            <tr>
                <td><a href="{{route('read_mat', [$mat->name])}}">{{substr($mat->name, 0, strrpos($mat->name, '_'))}}</a></td>
                <td><a href="{{route('download_mat', [$mat->name])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                    </svg>
                </a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
