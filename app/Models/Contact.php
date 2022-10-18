<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [

        'first_name',
        'last_name',
        'organization_id',
        'position_id',
        'service_id',
        'location_id',
        'phone',
        'short_phone',
        'phone_code',
        'email',
        'alias',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    //Query Scope
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('first_name', 'LIKE', "%" . $search . "%")
                ->orWhere('last_name', 'LIKE', "%" . $search . "%")
                ->orWhere('phone', 'LIKE', "%" . $search . "%")
                ->orWhere('phone_code', 'LIKE', "%" . $search . "%")
                ->orWhere('email', 'LIKE', "%" . $search . "%")
                ->orWhere('alias', 'LIKE', "%" . $search . "%")
                ->orWhereHas('organization', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%" . $search . "%");
                })
                ->orWhereHas('position', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%" . $search . "%");
                })
                ->orWhereHas('service', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%" . $search . "%");
                })
                ->orWhereHas('location', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%" . $search . "%");
                });
        });
    }
}
