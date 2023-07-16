<?php

namespace App\Models;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'niveau_id'
    ];

    public function niveau():BelongsTo {
        return $this->belongsTo(Niveau::class);
    }
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
