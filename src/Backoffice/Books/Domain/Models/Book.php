<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Books\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Lightit\Backoffice\Users\Domain\Models\User;

/**
 * @property int                             $id
 * @property string                          $title
 * @property int                             $author_id
 * @property string                          $description
 * @property int                             $category_id
 * @property int                             $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Book extends Model
{
    use HasApiTokens;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title', 'author_id', 'description', 'category_id', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, $this>
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Category, $this>
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Tag, $this>
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
