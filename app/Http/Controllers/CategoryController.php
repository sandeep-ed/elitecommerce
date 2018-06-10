<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        //$categories = Category::all();
         $categories = Category::where('parent', null)->get();

          foreach ($categories as $key => $value) {
           //echo $value->id. '<br>';
              $subcategories = Category::where('parent', $value->id)->get();
              //echo $value;
              $categories[$key]['subcategories'] = $subcategories;

                 foreach ($subcategories as $key1 => $value1) {
                      $subsubcategories = Category::where('parent', $value1->id)->get();
                      //echo $value;
                        $categories[$key]['subcategories'][$key1]['subsubcategories'] = $subsubcategories;
                  } 

          }

        return view('categories.index',compact('categories'))
            ->with('i');
    }
    
    public function create()
    {
        //$categories = array();

         $categories = Category::where('parent', null)->get();

          foreach ($categories as $key => $value) {
           //echo $value->id. '<br>';
              $subcategories = Category::where('parent', $value->id)->get();
              //echo $value;
              $categories[$key]['subcategories'] = $subcategories;

                 /* foreach ($subcategories as $key1 => $value1) {
                      $subsubcategories = Category::where('parent', $value1->id)->get();
                      //echo $value;
                        $categories[$key]['subcategories'][$key1]['subsubcategories'] = $subsubcategories;
                  }  */

          }
//dd($categories);

        return view('categories.create',compact('categories'));
    }
   
public function subcategories($key, $parent)
    {

        $categories = Category::where('parent', $parent->id)->get();
          foreach ($categories as $key => $value) {
              $subcategories = Category::where('parent', $parent->id)->get();
              //echo $value;
              $categories[$key]['subcategories']   =$subcategories;
          }  
    }

    public function store(Request $request)
    {
        request()->validate([
            'category' => 'required'
        ]);
        $slug=str_slug($request->category);
        Category::create($request->all()+['slug'=>$slug]);
        return redirect()->route('categories.index')
                        ->with('success','Category created successfully');
    }
    
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
   
    public function update(Request $request,Category $category)
    {
        request()->validate([
            'category' => 'required'
        ]);
        $slug=str_slug($request->category);

        $category->update($request->all()+['slug'=>$slug]);
        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }
    
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}