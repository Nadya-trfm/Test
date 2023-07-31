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

    public function create(Request $request)
    {
        $id = DB::table('clients')->insertGetId(
            [
                'full_name' => $request->input('full_name'),
                'is_female' => $request->input('is_female'),
                'tel' => $request->input('tel'),
                'address' => $request->input('address'),
            ]
        );
        return response()->json(DB::table('clients')->where('id', $id)->get());
    }

    public function update(Request $request, $id)
    {
        DB::table('clients')
            ->where('id', $id)
            ->update(
                [
                    'full_name' => $request->input('full_name'),
                    'is_female' => $request->input('is_female'),
                    'tel' => $request->input('tel'),
                    'address' => $request->input('address'),
                ]
            );
        return response()->json(DB::table('clients')->where('id', $id)->get());
    }

    public function delete($id)
    {
        DB::table('clients')->where('id', $id)->delete();
        return response()->json([
            'status' => 'OK'
        ]);
    }
}
