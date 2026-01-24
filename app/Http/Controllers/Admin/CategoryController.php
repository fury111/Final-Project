<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categoriecreate');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        'description' => 'nullable|string',
    ]);

    // Handle image upload if provided
    $imagePath = null;
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $imagePath = $request->file('image')->store('category_images', 'public');
    }

    Category::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'image_path' => $imagePath, // Save path to DB
        'description' => $request->description,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
}

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categoryshow', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categorieedit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        'description' => 'nullable|string',
    ]);

    $category = Category::findOrFail($id);

    // Handle image upload if provided
    $imagePath = $category->image_path; // Keep existing image by default
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        // Delete old image if it exists
        if ($category->image_path) {
            Storage::disk('public')->delete($category->image_path);
        }
        $imagePath = $request->file('image')->store('category_images', 'public');
    }

    $category->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'image_path' => $imagePath, // Update with new path or keep old
        'description' => $request->description,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}