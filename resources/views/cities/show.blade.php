@extends('layouts.app')

@section('content')
<div class='card'>
    <h1>{{ $city->name }}</h1>
    <label>County:</label>
    <p>{{ $city->county_id}}</p>
    <label>Zip code:</label>
    <p>{{ $city->zip_code}}</p>
    <label>Population:</label>
    <p>{{ number_format($city->population, 0, '.', ' ')}}</p>
</div>

@endsection