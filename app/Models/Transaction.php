<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'projects_id',
        'amount',
        'payment_url',
    ];

    public function project() {
        return $this->belongsTo(Project::class, 'projects_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
