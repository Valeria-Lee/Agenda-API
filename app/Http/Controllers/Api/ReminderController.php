<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;
use App\Http\Controllers\Controller;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Reminder::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReminderRequest $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reminder $reminder)
    {
        //
    }

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
