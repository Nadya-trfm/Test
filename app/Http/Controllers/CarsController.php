<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    public function getAll()
    {
        return response()->json(DB::table('cars')->paginate(4));
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'body_color' => ['required'],
            'plate_number' => ['required', 'unique:cars'],
            'is_parked' => ['required', 'boolean'],
            'owner_id' => ['required']
        ]);

        $id = DB::table('cars')->insertGetId($validatedData);

        return response()->json(DB::table('cars')->where('id', $id)->get());
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'body_color' => ['required'],
            'plate_number' => ['required', 'unique:cars'],
            'is_parked' => ['required', 'boolean'],
            'owner_id' => ['required']
        ]);
        DB::table('cars')
            ->where('id', $id)
            ->update($validatedData);

        return response()->json(DB::table('cars')->where('id', $id)->get());
    }

    public function delete($id): \Illuminate\Http\JsonResponse
    {
        DB::table('cars')->where('id', $id)->delete();
        return response()->json([
            'status' => 'OK'
        ]);
    }
}
