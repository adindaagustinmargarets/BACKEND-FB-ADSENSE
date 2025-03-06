@extends('backend.layouts.app')
@section('content')
@php
$title = 'Tambah Berita';
@endphp
<form action="{{ route('berita.tambah') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis">
                </div>
                <div class="col-md-6">
                    <label>kategori</label>
                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $data)
                        <option value="{{ $data->kategori }}">{{ $data->kategori }}</option>
                        @endforeach
                        <option value="Kategori Lain">Kategori Lain</option>
                    </select>
                    @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="editor" class="form-control" placeholder="Masukkan deskripsi"></textarea>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</form>
@endsection