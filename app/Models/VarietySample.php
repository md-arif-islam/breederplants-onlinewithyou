<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VarietySample extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
        'variety_report_id',
        'date',
        'leaf_color',
        'amount_of_branches',
        'flower_buds',
        'branch_color',
        'roots',
        'flower_color',
        'flower_petals',
        'flowering_time',
        'length_of_flowering',
        'seeds',
        'seed_color',
        'amount_of_seeds',
    ];

    /**
     * Get the variety report that owns the sample.
     */
    public function varietyReport()
    {
        return $this->belongsTo(VarietyReport::class);
    }

    /**
     * Set the images attribute.
     *
     * @param  array  $value
     * @return void
     */
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    /**
     * Get the images attribute.
     *
     * @param  string  $value
     * @return array
     */
    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
