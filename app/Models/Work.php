<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work extends Model
{
    use HasFactory;
    use ModelGet;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlist', 'work_id', 'user_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(WorkReview::class, 'work_id', 'id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'works_items', 'work_id', 'item_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'works_categories', 'work_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'work_id', 'id');
    }

    public function itemValue($item){
        return WorkItem::where([
            ['item_id', $item],
            ['work_id', $this->id]
        ])->first()->value;
    }

    /**
     * Get all of the transactions for the Work
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
