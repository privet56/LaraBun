<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *     definition="Rating",
 *     required={"bun_id", "user_id", "rating"},
 *     @SWG\Property(
 *          property="bun_id",
 *          type="integer",
 *          description="Bun id",
 *          example="1"
 *    ),
 *     @SWG\Property(
 *          property="user_id",
 *          type="integer",
 *          description="User id",
 *          example="2"
 *    ),
 *     @SWG\Property(
 *          property="rating",
 *          type="integer",
 *          description="Vote by rating",
 *          example="10"
 *    )
 * )
 */

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bun_id',
        'user_id',
        'rating'
    ];

    /**
     * Relationship.
     *
     * @var string
     */

    public function bun() {
      return $this->belongsTo('App\Bun');
    }
}
