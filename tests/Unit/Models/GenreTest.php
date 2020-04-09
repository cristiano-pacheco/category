<?php

namespace Tests\Unit\Models;

use App\Models\Genre;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tests\TestCase;

class GenreTest extends TestCase
{
    public function testFillableAttribute()
    {
        $this->assertEquals(['name', 'is_active'], (new Genre())->getFillable());
    }

    public function testIfUseTraits()
    {
        $traits = [SoftDeletes::class, Uuid::class];

        $categoryTraits = array_keys(class_uses(Genre::class));

        $this->assertEquals($traits, $categoryTraits);
    }

    public function testCastsAttribute()
    {
        $this->assertEquals(['id' => 'string', 'is_active' => 'boolean'], (new Genre())->getCasts());
    }

    public function testDatesAttribute()
    {
        $dates = ['deleted_at', 'created_at', 'updated_at'];
        $category = new Genre();
        foreach ($dates as $date) {
            $this->assertContains($date, $category->getDates());
        }
        $this->assertCount(count($dates), $category->getDates());
    }

    public function testIncrementing()
    {
        $this->assertFalse((new Genre())->incrementing);
    }
}
