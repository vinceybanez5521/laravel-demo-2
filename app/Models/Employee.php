<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    // Custom Attributes
    // these are fields that are created at runtime - does not exists in the database
    // but these are not accessible in the API response by default
    // to make this available in the API response - put it inside $appends attribute
    protected function fullName(): Attribute {
        return new Attribute(
            get: fn() => $this->first_name . ' ' . $this->last_name,
            set: function ($value) {
                return [
                    'first_name' => $value,
                    'last_name' => $value
                ];
            }
        );
    }

    protected $appends = [
        'full_name'
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
