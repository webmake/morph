<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ActionBook
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\App\ActionBook whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\ActionBook whereName($value)
 */
class ActionBook extends Model
{
    const TYPE = 'action';
    /** @var bool */
    public $timestamps = false;
    /** @var array */
    protected $fillable = [
        'name',
    ];
}
