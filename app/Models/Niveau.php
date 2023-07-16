<?php

namespace App\Models;

use App\Models\Cycle;
use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function cycle():BelongsTo{
        return $this->belongsTo(Cycle::class);
    }
    public function classes():HasMany{
        return $this->hasMany(Classe::class);
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
