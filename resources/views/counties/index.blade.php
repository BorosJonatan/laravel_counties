@extends('layouts.app')

@section('content')

    <div class="actions">
        <h1>Counties</h1>
        <a class="button" href="{{ route('counties.create') }}">Add new county</a>
    </div>
    <form method="GET" action="{{ route('counties.index') }}" style="margin-bottom: 20px">
      <input type="search" name="needle" value="{{ request('needle') }}">
      <button type="submit">Search</button>
    </form>
    <div class="city-container">
        <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Coat of Arms</th>
                    </tr>
                </thead>
                <tbody>
        @foreach($counties as $county)
        <tr>
            <td>{{ $county->name }}</td>
            <td><img src="{{ $county->coatofarms }}" style="width:60px;height:60px"></td>
            <td class="actions">
                <a class="button secondary" href="{{ route('counties.show', $county->id) }}">View</a>
                <a class="button" href="{{ route('counties.edit', $county->id) }}">Edit</a>
                <form action="{{ route('counties.destroy', $county->id) }}" method="POST">
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
      {{ $counties->links() }}
  </div>  

@endsection