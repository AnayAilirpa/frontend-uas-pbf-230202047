@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Obat</h3>
    <form method="POST" action="/obat">
        @csrf
        @include('obat.form')
        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection