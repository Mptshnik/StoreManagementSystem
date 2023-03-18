<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::paginate(10);

        return view('manufacturer.index', compact('manufacturers'));
    }

    public function create()
    {
        return view('manufacturer.create');
    }

    public function store(ManufacturerRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        Manufacturer::create($data);

        return redirect()->route('manufacturers.index');
    }

    public function show(Manufacturer $manufacturer)
    {
        return view('manufacturer.show', compact('manufacturer'));
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturer.edit', compact('manufacturer'));
    }

    public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $manufacturer->update($data);

        return redirect()->route('manufacturers.index');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect()->route('manufacturers.index');
    }
}
