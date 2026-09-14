@extends('layouts.app')

@section('content')
    <div class="card">
        <h1>Edit City</h1>

        <form action="{{ route('cities.update', $city->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $city->name) }}" required>
            <label for="county_id">County</label>
            <select id="county_id" name="county_id">
                <option value="">Select a county</option>
                @foreach ($counties as $county)
                    <option value="{{ $county->county_id }}" @selected(old('county_id', $county->county_id) == $county->county_id)>
                        {{ $county->name }}
                    </option>
                @endforeach
            </select>
            <label for="zip_code">Zip_code</label>
            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code', $city->zip_code) }}" required>
            <label for="population">Population</label>
            <input type="text" id="population" name="population" value="{{ old('population', $city->population) }}" required>

            <div class="actions">
                <button type="submit">Save city</button>
                <a class="button secondary" href="{{ route('cities.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection