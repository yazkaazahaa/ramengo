<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $totalMenu = Menu::count();

        $totalOrder = Order::count();

        $pesananSelesai = Order::whereIn(
            'status',
            ['Selesai', 'Siap Diambil']
        )->count();

        // Pendapatan hari ini
        $pendapatanHariIni = Order::whereIn(
            'status',
            ['Selesai', 'Siap Diambil']
        )
        ->whereDate('created_at', Carbon::today())
        ->sum('total_harga');

        // Pendapatan bulan ini
        $totalPendapatan = Order::whereIn(
            'status',
            ['Selesai', 'Siap Diambil']
        )
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->sum('total_harga');

        // Statistik order
        $orderHariIni = Order::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        $orderMingguIni = Order::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]
        )->count();

        $orderBulanIni = Order::whereMonth(
            'created_at',
            Carbon::now()->month
        )
        ->whereYear(
            'created_at',
            Carbon::now()->year
        )
        ->count();

        $recentOrders = Order::latest()
            ->take(5)
            ->get();

        return view(
            'admin.index',
            compact(
                'totalMenu',
                'totalOrder',
                'pesananSelesai',
                'totalPendapatan',
                'pendapatanHariIni',
                'orderHariIni',
                'orderMingguIni',
                'orderBulanIni',
                'recentOrders'
            )
        );
    }

    public function report()
    {
        return view('admin.report');
    }
}