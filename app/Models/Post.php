<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id_post
 * @property string $title
 * @property string $description
 * @property int $rill
 * @property int $fek
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIdPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @property int $isImage
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsImage($value)
 * @property string $id_user
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIdUser($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use HasFactory;

    protected $table = "posts",
        $primaryKey = "id_post",
        $fillable = ["id_user", "title", "description", "isImage"];
    public $timestamps = false;

    public static function validate(string $id_post): bool
    {
        return Post::whereIdPost($id_post)->first() !== null;
    }
}
