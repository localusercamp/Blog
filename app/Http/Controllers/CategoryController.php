<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Возвращает представление создания категории
     *
     * @return View
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Сохраняет категорию в базе
     *
     * @param  Request
     */
    public function store(Request $request)
    {
        $categories = Category::all();
        foreach ($categories as $category)
        {
            if($request->header('name') === $category->name){
                return;
            }
        }
        $category = new Category();
        $category->name = $request->header('name');
        $category->save();
    }

    /**
     * Возвращает список всех категорий
     *
     * @param  Request
     * @return JSON
     */
    public function allCategories(Request $request)
    {
        $categories = Category::all();
        $data = array();
        foreach($categories as $category)
        {
            $data[] = $category->name;
        }
        return response()->json([
            'categories' => $data
        ]);
    }
}
