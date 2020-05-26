<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function show(Category $category)
  {
    //return ddd($category->projects);  // Collection
    //return ddd($category->projects());  // Query Builder
    //return $category->projects()->with('category')->paginate();  // Query Builder

    return view('projects.index', [
      'category' => $category,    // Si la Categoría ha sido definida @isset($category)
      // Cargar la Categoría de cada Proyecto
      //'projects' => $category->projects->load('category')
      'projects' => $category->projects()->with('category')->latest()->paginate()
    ]);
  }
}