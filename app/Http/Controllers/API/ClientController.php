<?php
namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\ActivityLog;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with(['notes', 'projects', 'assignments'])
            ->latest()
            ->paginate(10);

        return ClientResource::collection($clients);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create([
            ...$request->validated(),
            'created_by' => auth()->id(),
        ]);

        return new ClientResource($client);
    }

    public function show($id)
    {
        $client = Client::with(['notes', 'projects', 'assignments'])->findOrFail($id);

        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->validated());


        return new ClientResource($client);
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['message' => 'Client deleted successfully.']);
    }



    private function logActivity($modelType, $modelId, $action, $details = null)
    {
        ActivityLog::create([
            'model_type' => $modelType,
            'model_id' => $modelId,
            'action' => $action,
            'user_id' => auth()->id(),
            'details' => $details,
        ]);
    }

}