<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function monikerName()
    {
        return $this->color . ' ' . $this->name;
    }

    public function scores()
    {
        return $this->hasOne(Score::class);
    }
}
