<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Animal extends Model
{
    use CrudTrait, ImageTrait;
    use Sluggable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'animals';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id',

                    ];
    protected $translatable = ['name', 'slug'];
    protected $fillable = ['name',
                        'slug',
                        'description',
                        'image',
                        'species_id',
                        'location_id',
                        'owner_id',
                        ];
    // protected $hidden = [];
    // protected $dates = [];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }
    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }
        return $this->name;
    }

    public function getImageSrcAttribute()
    {
        if ($this->image != '') {
            return asset($this->image);
        }
        return false;
    }

    public function species()
    {
        return $this->belongsTo('App\Models\Species', 'species_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\AnimalOwner', 'owner_id');
    }

}
