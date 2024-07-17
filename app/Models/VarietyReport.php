<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'thumbnail',
        'variety',
        'breeder_name',
        'grower_name',
        'amount_of_plants',
        'amount_of_samples',
        'next_sample_date',
        'pot_size',
        'pot_trial',
        'trial_location',
        'open_field_trial',
        'date_of_propagation',
        'date_of_potting',
        'cut_back',
        'removed_flowers',
        'caned',
    ];

    /**
     * Get the user that owns the variety report.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the samples for the variety report.
     */
    public function samples()
    {
        return $this->hasMany(VarietySample::class);
    }
}
