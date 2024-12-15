@extends('layouts.client_menu', ['client'=>$client])
@section('menu')
@parent
@endsection
@section('client_content')
<div>
    <div class="container mt-4" >
        @livewire('chat', ['receiver_id' => $client->id])        
    </div>
</div>
@endsection