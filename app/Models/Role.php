<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ["role", "superior"];

    public function userRole() {
        return $this->belongsTo("App\Models\UserRole");
    }

    public function superior() {
        return $this->belongsTo("App\Models\Role");
    }
}
