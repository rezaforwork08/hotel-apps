<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use App\Models\Rooms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        $reservations = Reservations::count();
        $occupied_rooms = Reservations::where('guest_status', 'checkin')->count();

        // Ambil semua room_id yang sedang dibooking hari ini
        $bookedRoomIds = Reservations::where('guest_check_in', '<=', $today)
            ->where('guest_check_out', '>=', $today)
            ->where('guest_status', '!=', 'cancelled') // abaikan yg dibatalkan
            ->pluck('room_id');

        // Ambil semua kamar yang tidak ada di bookedRoomIds
        $availableRooms = Rooms::whereNotIn('id', $bookedRoomIds)->get();
        $totalAvailable = $availableRooms->count();

        $dailyRevenue = Reservations::whereDate('guest_check_in', $today)
            ->where('guest_status', '!=', 'cancelled')
            ->sum('totalAmount');

        $currentBookings = Reservations::where('guest_status', 'confirmed')
            ->whereDate('guest_check_in', '<=', $today)
            ->whereDate('guest_check_out', '>=', $today)
            ->with('room') // kalau ada relasi ke tabel rooms
            ->get();


        return view('dashboard', compact('reservations', 'occupied_rooms', 'totalAvailable', 'dailyRevenue', 'currentBookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
