<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'judul', 'kegiatan'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }
}
