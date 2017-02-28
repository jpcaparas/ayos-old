<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Establishment extends Model
{
    use SoftDeletes, Searchable;

    protected $table = 'establishments';

    // TODO meta tags
    // TODO status
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'url',
        'is_active',
        'description',
        'latitude',
        'longitude',
        'city',
        'suburb',
        'region',
        'postcode',
        'founded_at',
        'establishment_type_id'
    ];

    public function establishmentTypeId()
    {
        return $this->belongsTo(EstablishmentType::class);
    }

    public function searchableAs()
    {
        return 'establishments_index';
    }
}
