<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct(
        private Category $category
    ) {
    }
    public function getSelectOption($parent_id)
    {
        $selectRecusive = new Recusive($this->category->all());
        $htmlOption = $selectRecusive->fatherRecusive($parent_id);
        return $htmlOption;
    }
    public function create()
    {
        $htmlOption = $this->getSelectOption($parent_id = '');
        return view('admin.category.add', compact('htmlOption'));
    }
    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|numeric'
            // Add other validation rules if needed
        ]);

        // Create a slug from the 'name'
        $slug = Str::slug($validatedData['name']);

        $newCategory = $this->category->create([
            'name' => $validatedData['name'],
            'parent_id' => $validatedData['parent_id'],
            'slug' => $slug // Assign the slug to the 'slug' field
            // Add other fields if needed
        ]);
        return redirect()->route('categories.create');
    }
    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getSelectOption($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }
    public function destroy($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
    public function update($id, Request $request)
    {
        // Create a slug from the 'name'
        $validatedData = $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|numeric'
            // Add other validation rules if needed
        ]);
        $slug = Str::slug($validatedData['name']);
        $this->category->find($id)->update([


            'name' => $validatedData['name'],
            'parent_id' => $validatedData['parent_id'],
            'slug' => $slug // Assign the slug to the 'slug' field
        ]);

        return redirect()->route('categories.index');
    }
}
