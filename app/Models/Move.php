<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    use HasFactory;
    protected $fillable=['cafe_id', 'lattitude', 'longitude', 'move_name', 'from_date', 'to_date'];



    public function cafe(){
        return $this->belongsTo(Cafe::class);
    }
}
