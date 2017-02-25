<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establishment extends Model
{
    use SoftDeletes;

    protected $table = 'establishments';

    // TODO slug
    // TODO meta tags
    // TODO status
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'url',
        'latitude',
        'longitude',
        'suburb',
        'region',
        'establishment_type_id'
    ];

    public function establishmentTypeId() {
        return $this->belongsTo(EstablishmentType::class);
    }
}
