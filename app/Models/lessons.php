<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'id_kelas',
        'judul',
        'pertanyaan',
        'pilihan',
        'jawaban',
    ];

    protected $casts = [
        'pilihan' => 'array', // jika pilihan disimpan dalam format JSON
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}