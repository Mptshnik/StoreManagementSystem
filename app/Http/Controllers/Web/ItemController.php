<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use App\Models\Manufacturer;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('categories')->with('manufacturer')->paginate(30);

        return view('item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();


        return view('item.create', compact('categories', 'manufacturers'));
    }

    public function store(ItemRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $request['preview_image']);
        $data['slug'] = $data['name'];

        unset($data['categories']);
        $item = Item::create($data);
        $categories = Category::whereIn('slug', $request->categories)->get();

        $item->categories()->attach($categories);

        foreach ($request->extra_images as $image) {
            $path = Storage::disk('public')->put('/images', $image);
            Image::create([
                'url' => $path,
                'item_id' => $item->id
            ]);
        }

        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('item.edit', compact('item', 'categories', 'manufacturers',));
    }

    public function update(ItemRequest $request, Item $item)
    {
        $data = $request->validated();
        $data['slug'] = $data['name'];

        if ($request->hasFile('preview_image')) {
            Storage::disk('public')->delete($item['preview_image']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $request['preview_image']);
        }

        if ($request->hasFile('images')) {

        }

        unset($data['categories']);
        $item->update($data);

        $categories = Category::whereIn('slug', $request->categories)->get();

        $item->categories()->detach();
        $item->categories()->attach($categories);

        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {


        $item->delete();

        return redirect()->route('items.index');
    }
}
