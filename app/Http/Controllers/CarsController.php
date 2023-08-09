<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CarsController extends Controller
{
    public function getAll()
    {
        return response()->json(DB::table('cars')->paginate(4));
    }

    public function getAllIsParked()
    {
        $result = DB::table('cars')
            ->where('is_parked', '=', '1')
            ->paginate(4);
        return response()->json($result);
    }

    public function getAllByOwner($ownerId)
    {

        $res = DB::table('clients')->where('id', $ownerId);
        if ($res->exists()) {
            $result = DB::table('cars')
                ->where('owner_id', '=', $ownerId)
                ->get();
            return response()->json($result);
        } else {
            return response()->json(['message' => 'Клиент не найден'], 404);
        }

    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = validator($request->all(), [
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'body_color' => ['required'],
            'plate_number' => ['required', 'unique:cars'],
            'is_parked' => ['required', 'boolean'],
            'owner_id' => ['required']
        ]);

        try {
            $validatedData = $validator->validate();
        } catch (ValidationException $e) {
            return response()->json(
                $validator->errors()
                , 422);
        }
        $res = DB::table('clients')->where('id', $request->string('owner_id')->trim());
        if ($res->exists()) {
            $id = DB::table('cars')->insertGetId($validatedData);
            return response()->json(DB::table('cars')->where('id', $id)->get());;
        } else {
            return response()->json(['message' =>$res->toSql(). 'Клиент не найден'], 404);
        }

    }

    public function getOne($id): \Illuminate\Http\JsonResponse
    {
        $res = DB::table('cars')->where('id', $id);
        if ($res->exists()) {
            return response()->json($res->get());
        } else {
            return response()->json(['message' => 'Car не найден'], 404);
        }

    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'brand' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'body_color' => ['required'],
            'plate_number' => ['required', ['required',  Rule::unique('cars')->ignore($id),]],
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
