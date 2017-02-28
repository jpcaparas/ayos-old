<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstablishmentType extends Model
{
    use SoftDeletes;

    protected $table = 'establishment_types';

    protected $fillable = [
        'reference',
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return HasMany
     */
    protected function establishments() {
        return $this->hasMany(Establishment::class, 'establishment_type_id', 'id');
    }
}
