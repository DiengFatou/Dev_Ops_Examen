<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = ['nom',  'volume_horaire', 'id_prof'];

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'id_prof');
    }
}
