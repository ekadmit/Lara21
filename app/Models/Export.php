<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $table = 'export_table';
    public static array $allowedFields =['id', 'name', 'phone', 'email', 'information', 'status'];
    protected $fillable = ['id', 'name', 'phone', 'email', 'information', 'status'];



}
