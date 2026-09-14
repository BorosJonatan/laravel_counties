@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Create County</h1>

        <form action="{{ route('counties.update', $county->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $county->name) }}" required>
            <label for="coatofarms">Coat of Arms</label>
            <input type="text" id="coatofarms" name="coatofarms" value="{{ old('coatofarms', $county->coatofarms) }}" required>

            <div class="actions">
                <button type="submit">Save county</button>
                <a class="button secondary" href="{{ route('counties.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection