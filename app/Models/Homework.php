<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Homework extends Model
{
    use HasFactory;
    protected $fillable = [
        'przedmiot',
        'tytul',
        'termin',
        'tresc'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
