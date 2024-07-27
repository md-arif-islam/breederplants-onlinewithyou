<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Allow mass assignment on the following fields
    protected $fillable = [
        'email',
        'password',
        'role',
        'status'
    ];

    public function grower()
    {
        return $this->hasOne(Grower::class);
    }

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
