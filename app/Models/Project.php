<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'title',
        'short_description',
        'description',
        'business_proposal_url',
        'image_url',
        'goals',
        'goal_amount',
        'current_amount',
        'deadline',
    ];
}
