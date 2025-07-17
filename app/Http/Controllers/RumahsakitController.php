<?php

namespace App\Http\Controllers;

use App\Models\Rumahsakit;
use Illuminate\Http\Request;


class RumahsakitController extends Controller
{
    public function index()
    {
        return response()->json(Rumahsakit::all());
    }

    public function show($no)
    {
        $rumahsakit = Rumahsakit::find($no);
        if (!$rumahsakit) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($rumahsakit);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'type' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $rumahsakit = Rumahsakit::create($request->all());
        return response()->json($rumahsakit, 201);
    }

    public function update(Request $request, $no)
    {
        $rumahsakit = Rumahsakit::find($no);
        if (!$rumahsakit) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $rumahsakit->update($request->all());
        return response()->json($rumahsakit);
    }

    public function destroy($no)
    {
        $rumahsakit = Rumahsakit::find($no);
        if (!$rumahsakit) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $rumahsakit->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
