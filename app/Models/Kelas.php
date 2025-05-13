<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $fillable = [
        'judul_kelas',
        'rating',
        'deskripsi',
        'mentor_id',
        'gambar',
        'categories',
        'link_youtube',
    ];

    protected $casts = [
        'categories' => 'array', // jika categories disimpan sebagai JSON
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id')->where('role', 'mentor');
    }
}
