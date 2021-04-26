<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = $this->data_tree($categories);
      
        
        return view('backend.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_tree($data, $parent_id = 0, $level = 0){
    
        $result = [];
        foreach($data as $key => $item){
            if($item['parent_id'] == $parent_id){
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$key]);
                $child = $this->data_tree($data, $item['id'], $level + 1 );
                $result = array_merge($result, $child);
            }

        }
        return $result;

        
    }
   
     
  
     public function create(Request $request,Category $category )
    {
        $categories = Category::all();
        $categories = $this->data_tree($categories);
    
        return view('backend.category', compact('category','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
    
        $data = $request->validated();
        $category= Category::create($data);
        return redirect()->back()->with('info',__('Created category: :name',['name'=>$category->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function edit(Request $request, Category $category )
    {
        
        $categories = Category::all();
        $categories = $this->notChoose($categories,$category->id);
       
        
        return view('backend.editcategory', compact('category','categories'));
    }

    public function notChoose($categories, $id)
    {
            foreach($categories as $key => $cate){
                if($cate->parent_id == $id){
                    unset($categories[$key]);
                    $this->notChoose($categories, $cate->id);
                }
                
            }
            return $categories;

    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $category )
    {
       
        $data = $request->validated();

         $category->update($data);
        // dd($category);
   
        return redirect()->route('categories.create')->with('edit',__('Updated category: :name', ['name' => $category->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteChildrenMenu($dataCate,$id)
    {
        foreach($dataCate as $cate){
            if($cate->parent_id == $id){
                $cate->delete();
                $this->deleteChildrenMenu($dataCate,$cate->id);
            }
        }

    }
    public function destroy( Category $category)  
    {
        // $category->delete();
        // return redirect()->back();

        $dataCate = Category::all();
        $this->deleteChildrenMenu($dataCate,$category->id);
        $category->delete();
        return redirect()->back()->with('info',"Xoá danh mục $category->name thành công");

      
    }
}

