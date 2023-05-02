<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Followers
 *
 * @property string $id_user_me
 * @property string $id_user_you
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereIdUserMe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Followers whereIdUserYou($value)
 * @mixin \Eloquent
 */
class Followers extends Model
{
    use HasFactory;
    protected $table = "followers",
        $fillable = ["id_user_me", "id_user_you"];
    public $timestamps = false;
}
