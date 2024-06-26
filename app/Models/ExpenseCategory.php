<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class ExpenseCategory extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'description',
        'category',
    ];
}
