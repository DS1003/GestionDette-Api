<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ClientController extends Controller
{
    public function index()
    {
        $clients = QueryBuilder::for(Client::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'surnom',
                'telephone',
                'adresse',
            ])
            ->allowedSorts(['id', 'surnom', 'telephone', 'adresse'])
            ->allowedIncludes(['user'])
            ->paginate(10);

        return ClientResource::collection($clients);
    }

    public function show($id)
    {
        $client = QueryBuilder::for(Client::class)
            ->allowedIncludes(['user'])
            ->findOrFail($id);

        return new ClientResource($client);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());
        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
