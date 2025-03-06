@extends('backend.layouts.app')
@section('content')
@php
$title = 'Data Berita';
@endphp
<a href="{{ route('berita.tambah-view') }}" class="btn btn-primary mb-3">Tambah</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($berita as $data)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->judul }}</td>
            <td>{{ $data->kategori }}</td>
            <td>{{ $data->penulis }}</td>
            <td>
                <button type="button" data-bs-toggle="modal" data-bs-target="#HapusModal{{ $data->id }}" class="btn btn-danger">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
@foreach($berita as $data)
@include('backend.admin.berita.modal.hapus')
@endforeach