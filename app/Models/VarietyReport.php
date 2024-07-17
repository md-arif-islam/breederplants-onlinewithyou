<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VarietyReport extends Model
{
    protected $fillable = [
        'user_id', 'name', 'slug', 'thumbnail', 'variety', 'breeder_id', 'grower_id', 'amount_of_plants', 'amount_of_samples',
        'next_sample_date', 'pot_size', 'pot_trial', 'trial_location', 'open_field_trial', 'date_of_propagation',
        'date_of_potting', 'cut_back', 'removed_flowers', 'caned'
    ];

    public function grower()
    {
        return $this->belongsTo(User::class, 'grower_id')->where('role', 'grower');
    }

    public function breeder()
    {
        return $this->belongsTo(User::class, 'breeder_id')->where('role', 'breeder');
    }
}
