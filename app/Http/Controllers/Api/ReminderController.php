<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReminderResource;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Reminder::all();
    }

    // Retiramos la funcion create porque las APIs no requieren regresar una vista.

    /**
     * Store a newly created resource in storage.
     */
    // TODO: Autorizacion para que pueda ser utilizada aqui.
    public function store(StoreReminderRequest $request) {
        try {
            $reminder = $request->all();
            $reminder->user_id = Auth::id();
            $reminder_res = new ReminderResource(Reminder::create($reminder));
            return response()->json($reminder_res, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se pudo crear el recordatorio'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            $reminder = Reminder::findOrFail($id);
            return response()->json($reminder);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se encontro el recordatorio con el ID ingresado'], 404);
        }
    }

    // Retiramos la funcion edit porque la API no requiere retornar una vista (formulario).

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        //
    }
}
