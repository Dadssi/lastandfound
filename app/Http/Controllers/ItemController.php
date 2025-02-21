<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category', 'user')->latest()->paginate(10);
        $categories = Category::all();
        return view('items.index', compact('items', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                // 'image_path' => 'nullable|image|mimes:jpg,png,jpeg,gif',
                'image_path' => 'nullable|string',
                'date' => 'required|date',
                'location' => 'required|string',
                'contact_email' => 'required|email',
                'contact_phone' => 'nullable|string',
                'type' => 'required|in:lost,found',
                'category_id' => 'required|exists:categories,id',
            ]
            );

            if ($request->hasFile('image_path')) {
                $validated['image_path'] = $request->file('image_path')->store('images', 'public');
            }
    
            $validated['user_id'] = auth()->id();
            Item::create($validated);

            return redirect()->route('items.index')->with('success', 'Annonce créée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'type' => 'required|in:lost,found',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('images', 'public');
        }

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Annonce mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Annonce supprimée.');
    }
}
