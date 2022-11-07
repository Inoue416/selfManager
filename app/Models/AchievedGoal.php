<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievedGoal extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'achieved_contents', 'achieved_memo', 'achieved_point'];
}
