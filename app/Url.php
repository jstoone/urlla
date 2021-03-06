<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'destination', 'shortcode',
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
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'shortcode';
    }

    /**
     * Defines the relationship between a url and it's user
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Defines the relationship between a url and it's clicks
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }

    /**
     * Get the destination url without GET parameters
     * 
     * @return string
     */
    public function base()
    {
        $urlParts = explode('?', $this->destination);

        return $urlParts[0];
    }

    public function utm()
    {
        $utmKeys = ['utm_source', 'utm_medium', 'utm_campaign'];
        $urlParts = explode('?', $this->destination);
        $getParams = array_filter(explode("&", $urlParts[1]), function($value) {
            return starts_with($value, 'utm_');
        });

        $getParams = array_combine($utmKeys, $getParams);
        $utmCollection = collect($getParams);

        dd($utmCollection->get('utm_source'));

    }

}
