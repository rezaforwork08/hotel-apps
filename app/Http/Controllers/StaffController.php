<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Staffs;
use RealRashid\SweetAlert\Facades\Alert;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Staffs::orderBy('id', 'desc')->get();
        $title = "Data Staff";
        return view('staff.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Staffs::create([
            'name'  => $request->name,
            'position_name'  => $request->position_name,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'address'  => $request->address,
            'join_date'  => $request->join_date,
        ]);
        toast('Tambah berhasil!', 'success');

        return redirect()->to('staffs');
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
        $edit = Staffs::find($id);
        $title = "Ubah Data Staff";
        return view('staff.edit', compact('edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Staffs::find($id);
        $categories->name = $request->name;
        $categories->position_name = $request->position_name;
        $categories->email = $request->email;
        $categories->phone = $request->phone;
        $categories->address = $request->address;
        $categories->join_date = $request->join_date;
        $categories->save();
        toast('Ubah berhasil!', 'success');

        return redirect()->to('staffs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staffs::find($id)->delete();
        toast('Hapus berhasil!', 'success');
        return redirect()->to('staffs');
    }
}
