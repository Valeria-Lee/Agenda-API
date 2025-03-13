<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Contact::all();
    }

    // Retiramos la funcion create porque las APIs no requieren regresar una vista.

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request) {    
        try {
            $contact = new ContactResource(Contact::create($request->all()));
            return response()->json($contact, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => "No se pudo crear el contacto {$contact->$id}"], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            $contact = Contact::findOrFail($id);
            return response()->json($contact);
        } catch (\Exception $e) {
            return response()->json(['message' => "No se encontro el contacto con el {$id}"], 404);
        }
    }

    // Retiramos la funcion edit porque la API no requiere retornar una vista (formulario).

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact) {
        $contact->update($request->all());
        return response()->json(['message' => "Contacto actualizado de forma exitosa"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact) { 
        $contact->delete();
        return response()->json(['message' => "Contacto eliminado de forma exitosa"], 200);
    }
}
