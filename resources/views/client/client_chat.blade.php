@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')
<div>
    <div class="container ms-mt100px" >
        @livewire('chat', ['receiver_id' => $client->id])        
    </div>
</div>
@endsection