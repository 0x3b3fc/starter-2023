<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        try {
            Category::create([
                'name' => $validated['name'],
                'status' => $validated['status'],
            ]);
            return redirect()->route('category.index')->with('success', 'تم انشاء القسم بنجاح');
        } catch (Exception $exception) {
            return redirect()->back();
//            dd($exception);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        try {
            $category->update([
                'name' => $validated['name'] ?? $category->name,
                'status' => $validated['status'] ?? $category->status,
            ]);
            return redirect()->route('category.index')->with('success', 'تم تعديل القسم بنجاح');
        } catch (Exception $exception) {
            return redirect()->back();
//            dd($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'تم حذف القسم بنجاح');
        } catch (Exception) {
            return redirect()->route('category.index')->with('danger', 'خطأ في حذف القسم');
        }
    }
}
