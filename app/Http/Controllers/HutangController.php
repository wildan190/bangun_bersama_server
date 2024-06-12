<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hutang;

class HutangController extends Controller
{
    public function index()
    {
        $hutangs = Hutang::all();
        return response()->json($hutangs);
    }

    public function store(Request $request)
    {
        $hutang = Hutang::create($request->all());
        return response()->json(['data' => $hutang, 'status' => 200]);
    }

    public function show(Hutang $hutang)
    {
        return response()->json($hutang);
    }

    public function update(Request $request, Hutang $hutang)
    {
        $hutang->update($request->all());
        return response()->json(['data' => $hutang, 'status' => 200]);
    }

    public function destroy($id)
    {
        $hutang = Hutang::findOrFail($id)->delete();
        return response()->json(['data' => $hutang, 'status' => 200]);
    }
}
