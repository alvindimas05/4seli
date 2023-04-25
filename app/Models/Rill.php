<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rill
 *
 * @property int $id_post
 * @property string $id_user
 * @method static \Illuminate\Database\Eloquent\Builder|Rill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rill whereIdPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rill whereIdUser($value)
 * @mixin \Eloquent
 */
class Rill extends Model
{
    use HasFactory;
    protected $table = "rill",
        $fillable = ["id_post", "id_user"];
    public $timestamps = false;
}
