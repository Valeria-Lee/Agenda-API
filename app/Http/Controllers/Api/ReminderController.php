<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        /*$reminder = $request->all();
        $reminder->user_id = Auth::id();
        return new ReminderResource(Reminder::create($reminder));*/
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
