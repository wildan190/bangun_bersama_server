<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return response()->json(['data' => $pakets, 'status' => 200]);
    }

    public function store(Request $request)
    {
        $paket = Paket::create($request->all());
        return response()->json(['data' => $paket, 'status' => 200]);
    }

    public function update(Request $request, $id)
    {
        $paket = Paket::findOrFail($id);
        $paket->update($request->all());
        return response()->json(['data' => $paket, 'status' => 200]);
    }

    public function destroy($id)
    {
        $paket = Paket::findOrFail($id)->delete();
        return response()->json(['data' => $paket, 'status' => 200]);
    }

    public function search($paket_name)
    {
        $paket = Paket::where('paket_name', 'like', "%$paket_name%")->get();
        return response()->json(['data' => $paket, 'status' => 200]);
    }
}

