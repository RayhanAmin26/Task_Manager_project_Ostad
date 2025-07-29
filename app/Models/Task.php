<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title']; // 🟢 mass-assignment এলো করার জন্য
}
