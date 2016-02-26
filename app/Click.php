<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url_id',
        'refferer',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes which should be cast to Carbon instances
     * 
     * @var array
     */
    protected $dates = [
        'created_at', 'deleted_at'
    ];

    /**
     * Defines the relationship between a click and it's url
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
