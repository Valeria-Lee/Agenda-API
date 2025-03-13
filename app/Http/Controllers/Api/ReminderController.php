<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ReminderResource;
use App\Notifications\ReminderDueNotification;

use App\Mail\ReminderDueMail; 
use Illuminate\Support\Facades\Log;

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
    public function store(StoreReminderRequest $request) {
        try {
            $reminderData = $request->all();
            $reminder = Reminder::create($reminderData);
    
            Log::info('Recordatorio creado de forma exitosa', ['reminder_id' => $reminder->id]);
    
            Mail::to($reminder->email)->send(new ReminderDueMail($reminder));

            return response()->json(new ReminderResource($reminder), 201);
        } catch (\Exception $e) {
            Log::error('Error al crear el recordatorio', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        
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
            return response()->json(['message' => "No se encontro el recordatorio con el {$did}"], 404);
        }
    }

    // Retiramos la funcion edit porque la API no requiere retornar una vista (formulario).

    // No se ocupa la ruta de update en recordatorio.

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder) {
        $reminder->delete();
        return response()->json(['message', "Recordatorio eliminado de forma exitosa"], 200);
    }
}
