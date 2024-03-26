<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post) {
        $this->category = $category;
        $this->post = $post;
    }

    public function index(){
        $all_categories = $this->category->latest()->orderby('name')->get();

        // count uncategorized posts
        $all_posts = $this->post->all(); // get all posts
        $uncategorized_count = 0;
        foreach($all_posts as $post) {
            if ($post->categoryPosts->count() == 0) {
                $uncategorized_count++;
            }
        }

        return view('admin.categories.index')->with('all_categories', $all_categories)->with('all_posts', $all_posts)->with('uncategorized_count', $uncategorized_count);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:50|unique:categories,name'
        ]);

        $category = new Category;
        $category->name = ucfirst($request->name);
        $category->save();

        return redirect()->back();
    }

    public function destroy($id) {
        $this->category->destroy($id);
 
        return redirect()->route('admin.categories');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => "required|max:50|unique:categories,name,$id"
        ]);

        // $category = new Category;
        $category = $this->category->findOrFail($id);
        $category->name = ucfirst($request->name);
        $category->save();

        return redirect()->back();
    }
}
