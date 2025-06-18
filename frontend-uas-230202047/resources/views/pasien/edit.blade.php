@extends('layouts.app')

@section('content')
<div>
    <h3>Edit pasien</h3>

    <form method="POST" action="/pasien/{{ $pasien['id'] }}">
        @csrf
        @method('PUT')

        <div>
            @include('pasien.form')
            <button>Update</button>
        </div>
    </form>
</div>
@endsection