<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name', 'display_name', 'description','table_name'
    ];

    public static function boot()
    {
        // before create
        static::creating(function ($permission) {
            $permission->updateName();
        });

        // before update
        static::updating(function ($permission) {
            $permission->updateName();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function updateName()
    {
        $this->name = str_slug($this->display_name,"-");
    }

    public static function getPermissions()
    {
        return self::get();
    }
}
