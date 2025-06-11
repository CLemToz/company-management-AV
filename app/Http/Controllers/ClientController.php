<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Show all clients
    public function index()
    {
        $clients = Client::latest()->get();
        return view('client.index', compact('clients'));
    }

    // Show form to create a client
    public function create()
    {
        return view('client.addUser');
    }

    // Store new client
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|string',
            'industry' => 'nullable|string',
            'tags' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $validated['created_by'] = auth()->user()->emp_id;

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    // Show form to edit client
    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    // Update client
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'website' => 'nullable|string',
            'industry' => 'nullable|string',
            'tags' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    //Show client's data in detail..
    public function show(Client $client)
    {
        return view('client.show', compact('client'));
    }

    // Delete client (soft delete)
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted.');
    }
}
