<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isEmpty;

class ClientsController extends Controller
{
    public function getAll()
    {
        return response()->json(DB::table('clients')->paginate(4));
    }

    public function getAllWithCars()
    {
        $res = DB::table('clients')
            ->leftJoin('cars', 'clients.id', '=', 'cars.owner_id')
            ->select('clients.id', 'clients.full_name', 'cars.brand', 'cars.model', 'cars.body_color', 'cars.plate_number')
            ->paginate(4);
        return response()->json($res);
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = validator($request->all(), [
            'full_name' => ['max:255', 'min:3'],
            'is_female' => ['required', 'boolean'],
            'tel' => ['required', 'unique:clients'],
            'address' => []
        ]);


        try {
            $validatedData = $validator->validate();
        } catch (ValidationException $e) {
            return response()->json(
                $validator->errors()
                , 422);
        }


        $id = DB::table('clients')->insertGetId($validatedData);

        return response()->json(DB::table('clients')->where('id', $id)->get());
    }

    public function getOne($id): \Illuminate\Http\JsonResponse
    {
        $res = DB::table('clients')->where('id', $id);
        if ($res->exists()) {
            return response()->json($res->get());
        } else {
            return response()->json(['message' => 'Студент не найден'], 404);
        }

    }


    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validator = validator($request->all(), [
            'full_name' => ['max:255', 'min:3'],
            'is_female' => ['required', 'boolean'],
            'tel' => ['required',  Rule::unique('clients')->ignore($id),],
            'address' => []
        ]);


        try {
            $validatedData = $validator->validate();
        } catch (ValidationException $e) {
            return response()->json(
                $validator->errors()
                , 422);
        }


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
