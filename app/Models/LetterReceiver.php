<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterReceiver extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "send_letter_id", "disposition_id"];

    public function sentLetter() {
        return $this->belongsTo("App\Models\SentLetter");
    }

    public function letterStatus() {
        return $this->hasMany("App\Models\LetterStatus");
    }
}
