<?php

namespace LidyaPos\Menu\Models;

use LidyaPos\Base\Enums\BaseStatusEnum;
use LidyaPos\Base\Models\BaseModel;
use LidyaPos\Base\Traits\EnumCastable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends BaseModel
{

    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Menu $menu) {
            MenuNode::where('menu_id', $menu->id)->delete();
        });
    }

    /**
     * @return HasMany
     */
    public function menuNodes()
    {
        return $this->hasMany(MenuNode::class, 'menu_id');
    }

    /**
     * @return HasMany
     */
    public function locations()
    {
        return $this->hasMany(MenuLocation::class, 'menu_id');
    }
}
