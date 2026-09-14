<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $query = City::query();

        if ($request->filled('needle')) {
            $query->where('name', 'like', '%' . $request->needle . '%');
        }
        
        $cities = $query
        ->orderBy('name')
        ->paginate(3);

        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $counties = County::all();

        return view('cities.create', compact('counties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:20'],
            'county_id' => ['required', 'exists:counties,id'],
            'population' => ['required'],
        ]);

        City::create($validated);

        return redirect()
            ->route('cities.index')
            ->with('status', 'Város létrehozva!');
    }

    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        $counties = County::all();

        return view('cities.edit', compact('city', 'counties'));
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:20'],
            'county_id' => ['required', 'exists:counties,id'],
            'population' => ['required'],
        ]);

        $city->update($validated);

        return redirect()
            ->route('cities.index')
            ->with('status', 'Város frissítve!');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()
            ->route('cities.index')
            ->with('status', 'Város törölve!');
    }
}