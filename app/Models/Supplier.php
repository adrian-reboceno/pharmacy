<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Traits\HasRoles;

class Supplier extends Model
{
    //
    protected $fillable = [
        'country_id',
        'state_id',
        'status_id',
        'name',
        'address',
        'city',
        'zip',
        'phone',
        'email',
        'website',
        'contact_person',
        'contact_phone',
        'contact_email'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
