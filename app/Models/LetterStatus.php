<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterStatus extends Model
{
    use HasFactory;

    protected $fillable = ["letter_receiver_id", "status", "read"];

    public function letterReceiver() {
        return $this->belongsTo("App\Models\LetterReceiver");
    }
}
