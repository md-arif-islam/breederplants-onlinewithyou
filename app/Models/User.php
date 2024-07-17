<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Allow mass assignment on the following fields
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    // Relationships
    public function varietyReportsAsGrower()
    {
        return $this->hasMany(VarietyReport::class, 'grower_id');
    }

    public function varietyReportsAsBreeder()
    {
        return $this->hasMany(VarietyReport::class, 'breeder_id');
    }

    public function varietyReports()
    {
        return $this->hasMany(VarietyReport::class, 'grower_id');
    }
}
