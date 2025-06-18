@extends('layouts.app')

@section('content')
<div>
    <h3>Edit Obat</h3>

    <form method="POST" action="/obat/{{ $obat['id'] }}">
        @csrf
        @method('PUT')

        <div>
            @include('obat.form')
            <button>Update</button>
        </div>
    </form>
</div>
@endsection