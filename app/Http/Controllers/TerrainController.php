<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTerrainRequest;
use App\Http\Requests\UpdateTerrainRequest;
use App\Models\Terrain;
use Illuminate\Http\Request;

class TerrainController extends Controller
{
    public function index()
    {
        return Terrain::all();
    }

    public function store(StoreTerrainRequest $request)
    {
        return Terrain::create($request->validated());
    }

    public function show(Terrain $terrain)
    {
        return $terrain;
    }

    public function update(UpdateTerrainRequest $request, Terrain $terrain)
    {
        $terrain->update($request->validated());
        return $terrain;
    }

    public function destroy(Terrain $terrain)
    {
        $terrain->delete();
        return response()->noContent();
    }
}
