<?php 
namespace Controllers\Admin;

use Models\Category;
class CategoryController{
 
    public function index(){
        $categories=Category::get();
        view("category","Admin","Category",[
            "categories"=>$categories
        ]);
    }
    public function create(){
        view("create","Admin","Category");
    }
    public function store(){
        $category_name=request("categoryName");
        if($category_name==""){
            return back()->with(["error"=>"Please fill this field"]);
        }
        try{
            Category::create([
                "category_name"=>$category_name,
            ]);
            return back()->with(["success"=>"Category Created!"]);
        }catch(\PDOException $err){
            echo $err->getMessage();
        }
    }
    public function edit($id){
       $category=Category::find($id);
        view("update","Admin","Category",[
            "category"=>$category
        ]);
    }
   public function update($id){
      Category::update($id,[
        'category_name'=>request('categoryName')
      ]);
      return back()->with(["success"=>"Category Updated!"]);
   }
   public function delete($id){
      Category::delete($id);
      return back()->with(["success"=>"Category Deleted!"]);
   }

}

?>