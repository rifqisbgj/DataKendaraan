<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\StoreVehicleRequest;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $veh = Vehicle::where('no_reg','LIKE','%'.$req->noreg.'%')
            ->where('nama_pemilik','LIKE','%'.$req->nama_pemilik.'%')
            ->orderBy('created_at')
            ->get();

        // return $veh;
        return view('vehicle.index', compact('veh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        Vehicle::create($request->all());
        $request->session()->flash('success',"Data dengan kode kendaraan {$request->no_reg} berhasil ditambahkan");

        return redirect(route('kendaraan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        // return $vehicle;
        return view('vehicle.view', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veh = Vehicle::find($id);
        return view('vehicle.update', compact('veh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->fill($request->validated());
        $vehicle->save();
        $request->session()->flash('success',"Data dengan kode kendaraan {$request->no_reg} berhasil diperbarui");

        return redirect(route('kendaraan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        Vehicle::destroy($req->noreg);
        $req->session()->flash('success',"Data dengan kode kendaraan {$req->noreg} berhasil dihapus");
        return redirect(route('kendaraan'));
    }
}
