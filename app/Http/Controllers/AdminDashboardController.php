<?php

namespace App\Http\Controllers;

use App\Models\SuryaCustomer;
use App\Models\SuryaRental;
use App\Models\SuryaItem;
use App\Models\SuryaUser;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil total customer
        $totalCustomer = SuryaCustomer::count();

        // (Bonus) Ambil total rental & item kalau mau sekalian
        $totalRental   = SuryaRental::count();
        $totalItem     = SuryaItem::where('stock', '>', 0)->count();

        // Ambil nama Member baru
        $latestUser = SuryaUser::latest()->first();
        $latestUserTime = $latestUser ? $latestUser->created_at->diffForHumans() : null;

        //Ambil nama rental baru
        $latestRental = SuryaRental::with('customer')->latest()->first();
        $latestRentalTime = $latestRental ? $latestRental->created_at->diffForHumans() : null;

        //Ambil nama item baru
        $latestItem = SuryaItem::latest()->first();
        $latestItemTime = $latestItem ? $latestItem->created_at->diffForHumans() : null;

        // Kirim ke view
        return view('admin.adminDashboard', compact(
            'totalCustomer', 
            'totalRental', 
            'totalItem',
            'latestUser',
            'latestUserTime',
            'latestRental',
            'latestRentalTime',
            'latestItem',
            'latestItemTime'
        ));
    }
}
