<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
    ];

    /* 
    protected $guarded = [
        'created_at',
        'updated_at'
    ]; 
    */

    // protected $guarded = []; // will make all fields fillable

    // commonly used with APIs - used to hide fields from API request
    // fields inside this attribute will not be returned in the API response
    /* protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ]; */

    // protected $table = 'legacy_employees'; // specify which table this object should point to
}
