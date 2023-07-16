<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = ["title", "refrences_number", "body", "sender", "user_id", "letter_destination", "letter_category_id"];

    public function letterCategory() {
        return $this->belongsTo("App\Models\LetterCategory");
    }

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function letterHistory() {
        return $this->hasMany("App\Models\LetterHistory");
    }

    public function letterReceiver() {
        return $this->hasMany("App\Models\LetterReceiver");
    }
}
