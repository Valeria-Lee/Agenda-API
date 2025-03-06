<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Models\Rol;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return Rol::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        // En caso de no encontrarlo, enviar mensaje de error.
        try {
            $rol = Rol::findOrFail($id);
            return response()->json($rol);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se encontro el rol con el ID ingresado'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolRequest $request, Rol $rol) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol) {
        //
    }
}
