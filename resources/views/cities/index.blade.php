@extends('layouts.app')

@section('content')

    <div class="actions">
        <h1>Cities</h1>
        <a class="button" href="{{ route('cities.create') }}">Add new city</a>
    </div>
    <form method="GET" action="{{ route('cities.index') }}" style="margin-bottom: 20px">
        <input type="search" name="needle" value="{{ request('needle') }}">
        <button type="submit">Search</button>
    </form>
    <div class="city-container">
        <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>County</th>
                        <th>Zip_code</th>
                        <th>Population</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->name }}</td>
            <td>{{ $city->county->name }}</td>
            <td>{{ $city->zip_code }}</td>
            <td>{{ $city->population }}</td>
            <td class="actions">
                <a class="button secondary" href="{{ route('cities.show', $city->id) }}">View</a>
                <a class="button" href="{{ route('cities.edit', $city->id) }}">Edit</a>
                <form action="{{ route('cities.destroy', $city->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='danger'>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </table>  
    </div>  
    <div class="paginator">
        {{ $cities->links() }}
    </div>  

@endsection