<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchievedTodolist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'achieved_title', 'achieved_memo', 'achieved_contents', 'got_point'];
}
