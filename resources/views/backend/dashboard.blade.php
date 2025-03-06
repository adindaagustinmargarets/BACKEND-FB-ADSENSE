@extends('backend.layouts.app')
@section('content')
@php
$title = 'Dashboard';
@endphp
<div class="card">
    <div class="card-body">
        <p>Selamat Datang kembali {{ Auth::user()->name }}</p>
        <p>ini tokenmu : {{ Auth::user()->token }}</p>
    </div>
</div>
@endsection