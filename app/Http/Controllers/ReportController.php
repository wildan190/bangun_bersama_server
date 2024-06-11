<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    public function period(Request $request)
    {
        $period = $request->input('period', 'month');
        $year = $request->input('year', date('Y'));

        if ($period == 'month') {
            $month = $request->input('month', date('m'));
            $transactions = Transaksi::whereYear('transaction_date', $year)
                ->whereMonth('transaction_date', $month)
                ->get();
        } elseif ($period == 'year') {
            $transactions = Transaksi::whereYear('transaction_date', $year)
                ->get();
        } elseif ($period == 'week') {
            $week = $request->input('week', date('W'));
            $yearForWeek = $request->input('yearForWeek', date('Y'));
            $transactions = Transaksi::whereYear('transaction_date', $yearForWeek)
                ->where(function ($query) use ($week, $yearForWeek) {
                    $query->whereRaw('WEEK(transaction_date, 1) = ? AND YEAR(transaction_date) = ?', [$week, $yearForWeek])
                        ->orWhereRaw('YEARWEAK(transaction_date, 1) = ?', [$yearForWeek . $week]);
                })
                ->get();
        } else {
            return response()->json(['error' => 'Invalid period'], Response::HTTP_BAD_REQUEST);
        }

        // Hitung total penjualan bulanan
        $periodSales = $transactions->sum('total_price');

        $data = [
            'transactions' => $transactions,
            'periodSales' => $periodSales,
            'year' => $year,
            'period' => $period
        ];

        if ($period == 'week') {
            $data['week'] = $week;
            $data['yearForWeek'] = $yearForWeek;
        } elseif ($period == 'month') {
            $data['month'] = $month;
        }

        return response()->json($data, Response::HTTP_OK);
    }

    public function report(Request $request)
    {
        $productSales = DB::table('transaksis')
            ->join('pakets', 'transaksis.paket_id', '=', 'pakets.id')
            ->select('pakets.paket_name', DB::raw('SUM(transaksis.qty) as total_sold'), DB::raw('SUM(transaksis.qty * pakets.price) as total_sales_value'))
            ->groupBy('pakets.paket_name')
            ->get();

        $data = [
            'productSales' => $productSales
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}

