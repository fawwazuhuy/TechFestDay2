<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama'
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function taskses()
    {
        return $this->hasMany(Task::class);
    }

}
