<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\lessons;
use Illuminate\Support\Facades\Validator;

class LessonsController extends Controller
{
    // GET /api/lessons
    public function index()
    {
        return response()->json(lessons::all(), 200);
    }

    // GET /api/lessons/{id}
    public function show($id)
    {
        $lesson = lessons::find($id);
        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }
        return response()->json($lesson, 200);
    }

    // POST /api/lessons
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'judul' => 'required|string|max:255',
            'pertanyaan' => 'nullable|string',
            'pilihan' => 'nullable|array',
            'jawaban' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lesson = lessons::create($request->all());
        return response()->json($lesson, 201);
    }

    // PUT /api/lessons/{id}
    public function update(Request $request, $id)
    {
        $lesson = lessons::find($id);
        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_kelas' => 'sometimes|required|exists:kelas,id_kelas',
            'judul' => 'sometimes|required|string|max:255',
            'pertanyaan' => 'nullable|string',
            'pilihan' => 'nullable|array',
            'jawaban' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lesson->update($request->all());
        return response()->json($lesson, 200);
    }

    // DELETE /api/lessons/{id}
    public function destroy($id)
    {
        $lesson = lessons::find($id);
        if (!$lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }

        $lesson->delete();
        return response()->json(['message' => 'Lesson deleted successfully'], 200);
    }
}
