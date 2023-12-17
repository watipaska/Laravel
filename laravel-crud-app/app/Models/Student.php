<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Table name
    protected $table = 'students';

    // Primary key
    protected $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    // Validation rules
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable|digits:10',
    ];
}
