<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *     definition="Bun",
 *     required={"name", "desc", "picture"},
 *     @SWG\Property(
 *          property="name",
 *          type="string",
 *          description="name",
 *          example="bun"
 *    ),
 *     @SWG\Property(
 *          property="desc",
 *          type="string",
 *          description="description",
 *          example="my bun"
 *    ),
*     @SWG\Property(
 *          property="picture",
 *          type="string",
 *          description="Bun image URL",
 *          example="http://www.sample.com/my.bun.jpg"
 *    )
 * )
 */

class Bun extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'desc',
        'picture'
    ];

    /**
     * Relationship.
     *
     * @var string
     */

    public function items() {
        return $this->hasMany('App\Item');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
  
    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
