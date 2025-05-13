<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    // GET /api/kelas
    public function index()
    {
        return response()->json(Kelas::all(), 200);
    }

    // GET /api/kelas/{id}
    public function show($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return response()->json(['error' => 'Kelas not found'], 404);
        }
        return response()->json($kelas, 200);
    }

    // POST /api/kelas
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_kelas' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'deskripsi' => 'nullable|string',
            'mentor_id' => 'required|integer',
            'gambar' => 'nullable|string',
            'categories' => 'nullable|string',
            'link_youtube' => 'nullable|string|url'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kelas = Kelas::create($request->all());
        return response()->json($kelas, 201);
    }

    // PUT /api/kelas/{id}
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return response()->json(['error' => 'Kelas not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'judul_kelas' => 'sometimes|required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'deskripsi' => 'nullable|string',
            'mentor_id' => 'nullable|integer',
            'gambar' => 'nullable|string',
            'categories' => 'nullable|string',
            'link_youtube' => 'nullable|string|url'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kelas->update($request->all());
        return response()->json($kelas, 200);
    }

    // DELETE /api/kelas/{id}
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return response()->json(['error' => 'Kelas not found'], 404);
        }

        $kelas->delete();
        return response()->json(['message' => 'Kelas deleted'], 200);
    }
}