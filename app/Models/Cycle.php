<?php

namespace App\Models;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cycle extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'] ;

    public function niveaux():HasMany{
        return $this->hasMany(Niveau::class);
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
