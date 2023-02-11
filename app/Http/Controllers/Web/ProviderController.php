<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('provider.index', compact('providers'));
    }

    public function create()
    {
        return view('provider.create');
    }

    public function store(ProviderRequest $request)
    {
        $data = $request->validated();
        Provider::create($data);

        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        return view('provider.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('provider.edit', compact('provider'));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());

        return redirect()->route('providers.index');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('providers.index');
    }
}
