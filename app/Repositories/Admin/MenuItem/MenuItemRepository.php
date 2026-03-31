<?php

namespace App\Repositories\Admin\MenuItem;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuItemRepository implements MenuItemRepositoryInterface
{
    public function getAll()
    {
        return MenuItem::all();
    }

    public function getMenuItemsByMenuId($menuId)
    {
        return MenuItem::with('menuItemTranslations')
            ->where('menu_id', $menuId)
            ->get();
    }

    public function createMenuItem(Request $request, $menuId)
    {
        return DB::transaction(function () use ($request, $menuId) {
            $defaultTitle = $request->title['en'] ?? 'menu-item';

            $slug = Str::slug($defaultTitle);
            $slugCount = MenuItem::where('slug', 'like', "{$slug}%")->count();
            if ($slugCount > 0) {
                $slug .= '-'.($slugCount + 1);
            }

            $menuItem = MenuItem::create([
                'menu_id' => $menuId,
                'slug' => $slug,
                'order_number' => $request->order_number,
                'parent_id' => $request->parent_id ?? null,
            ]);

            $menuItem->translations()->create([
                'language_code' => 'en',
                'title' => $request->title['en'],
            ]);

            return $menuItem;
        });
    }

    public function updateMenuItem(Request $request, $menuId, $menuItemId)
    {
        $menuItem = MenuItem::with('translations')->findOrFail($menuItemId);
        $slug = Str::slug($request->title['en'] ?? 'menu-item');

        $menuItem->update([
            'menu_id' => $request->menu_id,
            'parent_id' => $request->parent_id,
            'order_number' => $request->order_number,
            'slug' => $slug,
        ]);

        $translation = $menuItem->translations()->where('language_code', 'en')->first();
        if ($translation) {
            $translation->update(['title' => $request->title['en']]);
        } else {
            $menuItem->translations()->create([
                'language_code' => 'en',
                'title' => $request->title['en'],
            ]);
        }

        $menuItem->translations()->where('language_code', '!=', 'en')->delete();

        return $menuItem;
    }

    public function deleteMenuItem($menuItemId)
    {
        $menuItem = MenuItem::findOrFail($menuItemId);

        return $menuItem->delete();
    }
}
