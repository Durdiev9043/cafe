<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;
    protected $fillable=['name','phone','img','user_id','status'];


    public array $st=[1=>'active',0=>'active emas'];
}
