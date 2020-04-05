<?php

namespace App\Models\Traits;

trait Uuid
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($object) {
            $object->id = \Ramsey\Uuid\Uuid::uuid4();
        });
    }
}
