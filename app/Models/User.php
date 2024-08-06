<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function breeder()
    {
        return $this->hasOne(Breeder::class);
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
}
