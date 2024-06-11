<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return response()->json($transaksis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'link' => 'required|url',
            // 'transaction_date' => 'nullable|date',
            // 'transaction_number' => 'required|string|unique:transaksis',
            'paket_id' => 'required|exists:pakets,id',
            'qty' => 'required|integer',
            'discount' => 'nullable|numeric|min:0|max:100',
            'total_price' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $transaksi = Transaksi::create($validatedData);

        return response()->json($transaksi, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return response()->json($transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'link' => 'required|url',
            // 'transaction_date' => 'nullable|date',
            // 'transaction_number' => 'required|string|unique:transaksis,transaction_number,' . $transaksi->id,
            'paket_id' => 'required|exists:pakets,id',
            'qty' => 'required|integer',
            'discount' => 'nullable|numeric|min:0|max:100',
            'total_price' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $transaksi->update($validatedData);

        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return response()->json(null, 204);
    }
}
