<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    public function getAll()
    {
        return response()->json(DB::table('clients')->paginate(4));
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'max:255', 'min:3'],
            'is_female' => ['required', 'boolean'],
            'tel' => ['required', 'unique:clients'],
            'address' => []
        ]);

        $id = DB::table('clients')->insertGetId($validatedData);

        return response()->json(DB::table('clients')->where('id', $id)->get());
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'full_name' => ['required', 'max:255', 'min:3'],
            'is_female' => ['required', 'boolean'],
            'tel' => ['required', 'unique:clients'],
            'address' => []
        ]);
        DB::table('clients')
            ->where('id', $id)
            ->update($validatedData);

        return response()->json(DB::table('clients')->where('id', $id)->get());
    }

    public function delete($id): \Illuminate\Http\JsonResponse
    {
        DB::table('clients')->where('id', $id)->delete();
        return response()->json([
            'status' => 'OK'
        ]);
    }
}
