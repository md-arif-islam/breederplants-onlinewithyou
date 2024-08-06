<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'variety_name', 'grower_id', 'breeder_id', 'amount_of_plants', 'pot_size', 'pot_trial',
        'open_field_trial', 'date_of_propagation', 'date_of_potting', 'samples_schedule', 'status'
    ];

    public function grower()
    {
        return $this->belongsTo(Grower::class, 'grower_id', 'user_id');
    }

    public function breeder()
    {
        return $this->belongsTo(Breeder::class, 'breeder_id', 'user_id');
    }

    public function samples()
    {
        return $this->hasMany(VarietySample::class);
    }
}
