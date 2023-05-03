<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Block
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block query()
 * @property string $id_user_me
 * @property string $id_user_you
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereIdUserMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereIdUserYou($value)
 * @mixin \Eloquent
 */
class Block extends Model
{
    use HasFactory;
    protected $table = "block",
        $fillable = ["id_user_me", "id_user_you"];
    public $timestamps = false;
}
