<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TestModel extends Model
{
    use HasFactory;

    protected $table = 'test_table';
    protected $fillable = ['countryCode','countryName'];
}
