<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**
 * @SWG\Definition(
 *     definition="Item",
 *     required={"res", "name", "bun_id"},
 *     @SWG\Property(
 *          property="res",
 *          type="string",
 *          description="Item Resource",
 *          example="my resource"
 *    ),
 *     @SWG\Property(
 *          property="name",
 *          type="string",
 *          description="Item name",
 *          example="name"
 *    ),
 *    @SWG\Property(
 *          property="bun_id",
 *          type="string",
 *          description="Association with: bun_id",
 *          example="1"
 *    )
 * )
 */

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'res',
        'name',
        'bun_id'
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
