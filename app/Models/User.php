<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Other model methods and properties

    public function varietyReportsAsGrower()
    {
        return $this->hasMany(VarietyReport::class, 'grower_id');
    }

    public function varietyReportsAsBreeder()
    {
        return $this->hasMany(VarietyReport::class, 'breeder_id');
    }
}
