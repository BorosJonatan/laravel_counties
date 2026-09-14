@extends('layouts.app')

@section('content')
<div class='card'>
    <h1>{{ $city->name }}</h1>
    <label>County:</label>
    <p>{{ $city->county_id}}</p>
    <label>Zip code:</label>
    <p>{{ $city->zip_code}}</p>
    <label>Population:</label>
    <p>{{ $city->population}}</p>
</div>

@endsection