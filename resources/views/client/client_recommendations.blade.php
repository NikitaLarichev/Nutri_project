@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')

<div class="container ms-mt100px">
    <div class="container">
        <form method="post" action={{route('add_rec')}}>
        @csrf
            <input type="hidden" name="client_id" value="{{$client->id}}"/>
            <input type="text" name="content"/>
            <input type="submit" value="Добавить рекомендацию"/>
        </form>
        <table class="table">
            @foreach($recs as $rec)
                <tr><th>{{$rec->date}}</th></tr>
                <tr>
                    <td>
                        <div>{{$rec->content}}</div>
                        <div><a href="{{route('delete_rec', [$rec->id])}}">delete</a></div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>     
</div>

@endsection
