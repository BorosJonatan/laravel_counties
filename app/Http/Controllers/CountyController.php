<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = County::query();
    
        if ($request->filled('needle')) {
            $query->where('name', 'like', '%' . $request->needle . '%');
        }
    
        $counties = $query
            ->orderBy('name')
            ->paginate(3);
    
        return view('counties.index', compact('counties'));
    }

    public function create()
    {
        return view('counties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'coatofarms' => ['required', 'string']
        ]);

        $county = County::create($validated);

        return redirect()
            ->route('counties.index', $county)
            ->with('status', 'Megye létrehozva!');
    }

    public function show(County $county)
    {
        return view('counties.show', compact('county'));
        // API: return response()->json($county);
    }

    public function edit(County $county)
    {
        return view('counties.edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'coatofarms' => ['required', 'string']
        ]);

        $county->update($validated);

        return redirect()
            ->route('counties.index', $county)
            ->with('status', 'Megye frissítve!');
    }

    public function destroy(County $county)
    {
        $county->delete();

        return redirect()
            ->route('counties.index')
            ->with('status', 'Megye törölve!');
    }
}
