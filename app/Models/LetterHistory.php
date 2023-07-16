<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterHistory extends Model
{
    use HasFactory;

    protected $fillable = ["note"];

    public function letter() {
        return $this->belongsTo("App\Models\Letter");
    }
}
