@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('paid') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name='id' value="{{$id}}">
                    <button class="btn btn-block btn-primary">
                        Paid
                    </button>

@endsection
