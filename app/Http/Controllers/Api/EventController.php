<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Event::all();
    }

    // Retiramos la funcion create porque las APIs no requieren regresar una vista.

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request) {
        try {
            $event = new EventResource(Event::create($request->all()));
            return response()->json($event, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se pudo crear el evento']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            $event = Event::findOrFail($id);
            return response()->json($event);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se encontro el evento con el ID ingresado'], 404);
        }
    }

    // Retiramos la funcion edit porque la API no requiere retornar una vista (formulario).

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event) {
        $event->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
