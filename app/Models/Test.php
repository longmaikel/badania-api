<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function testCategories(): BelongsToMany
    {
        return $this->belongsToMany(TestCategory::class)
            ->withTimestamps();
    }

}
