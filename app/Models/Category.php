<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $table = "category";


    public function products()
    {
        return $this->hasMany(Product::class, "categoryId");
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, "parentId");
    }

    public function child()
    {
        return $this->hasMany(Category::class, "parentId");
    }

    /**
     * Get category tree IDs for a given slug
     */
    public static function getCategoryTreeIds($slug): array
    {
        $rootCategory = self::where('slug', $slug)->first();

        if (!$rootCategory) {
            return [];
        }

        $categoryIds = [$rootCategory->id];
        self::getChildCategoryIds($rootCategory->id, $categoryIds);

        return $categoryIds;
    }

    /**
     * Recursively get all child category IDs
     */
    private static function getChildCategoryIds($parentId, array &$categoryIds): void
    {
        $childCategories = self::where('parentId', $parentId)->get();

        foreach ($childCategories as $childCategory) {
            if (!in_array($childCategory->id, $categoryIds)) {
                $categoryIds[] = $childCategory->id;
                self::getChildCategoryIds($childCategory->id, $categoryIds);
            }
        }
    }
}
