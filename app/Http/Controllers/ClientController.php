<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use GoogleMaps\Facades\GoogleMaps;

class ClientController
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {

        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'street' => $request->street,
            'number' => $request->number,
            'district' => $request->district,
        ]);
        $client->save();

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function getLocation(Request $request) {
        // Obtenha o endereço do formulário
        $address = $request->input('address');
        
        // Use a API do Turf para obter a localização
        $location = Turf::getLocation($address);
        
        // Armazene os dados obtidos
        // ...
        
        // Redirecione o usuário para a página de resultados
        return redirect()->route('results');
    }
    
}