<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class Work extends Model
{
    use HasFactory;
    use ModelGet;

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
