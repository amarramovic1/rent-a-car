<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = Client::query();
        if ($request->has('searchTerm')){
            $term=$request->get('searchTerm');
            $clients->where('first_name','like', "%{$term}%")
                ->orWhere('last_name','like', "%{$term}%");
        }
        $clients=$clients->get();
        return view('client.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
        $newClientDetails=$request->except('_token');
        Client::query()->create($newClientDetails);
        return Redirect::route('client.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $client=Client::query()->findOrFail($id);
        return view('client.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id,Request $request){
        $client=Client::query()->findOrFail($id);
        $newDetails = $request->only(['first_name','last_name','document_type','number_of_documents','country','date_of_birth']);
        $client->update($newDetails);

        return Redirect::route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $client=Client::query()->findOrFail($id);
        $client->delete();

        return Redirect::route('client.index');
    }
}
