<?php

namespace App\Http\Controllers;

use App\Category;
use App\Shop;
use Validator;
use Illuminate\Http\Request;

use PDF;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryTitle = $request->categoryTitle; // pavadinimas

        $filterCategories = Category::all();

        if($categoryTitle) {
            //vykdoma filtracija sortable()
            $categories = Category::sortable()->where("title", $categoryTitle)->paginate(10); //sortable()
        } else {
            $categories = Category::sortable()->paginate(10); //sortable()
        }

        return view("category.index",["categories"=>$categories, "filterCategories" => $filterCategories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $shops=Shop::all();
        return view ("category.create", ["categories"=>$categories, "shops"=>$shops]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$shops=Shop::all();

        $input = [
            'categoryTitle' => $request->categoryTitle,
            'categoryDescription' => $request->categoryDescription,
            'categoryShops' => $request->categoryShops,

        ];

        $rules = [
            'categoryTitle' => 'required|min:3',
            'categoryDescription' => 'required|min:3',

        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $category = new Category;

            $category->title = $request->categoryTitle;
            $category->description = $request->categoryDescription;
            $category->shop_id = $request->shop_id;

            $category->save();

            $success = [
                'message' => '[Back-End] Category added successfully',
                'categoryID' => $category->id,
                'categoryTitle' => $category->title,
                'categoryDescription' => $category->description,
                'categoryShop' => $category->shop_id,
            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $error = [
            'error' => $validator->messages()->get("*")
        ];

        $error_json = response()->json($error);

        return $error_json;

    }

        // senas store
        //$shops=Shop::all();
        //$shop_count=$shops->count();

        //$category=new Category();


        //$validateVar = $request->validate([

            //'title' => 'required|min:8|max:200',
            //'description' => 'required|min:8|max:400',
            //]);


        //$category->title=$request->title;
        //$category->description=$request->description;

        //$category->shop_id = $request->shop_id;

        //$category->save();

            //return redirect()->route("category.index");


    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $shops=$category->categoryShops;

        return view("category.show",["category"=>$category, "shops"=> $shops]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $shops = Shop::all()->sortBy("id", SORT_REGULAR, true);
        return view("category.edit", ["category"=>$category, "shops"=>$shops]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validateVar = $request->validate([

            'title' => 'required|min:8|max:200',
            'description' => 'required|min:8|max:400',
            ]);


        $category->title=$request->title;
        $category->description=$request->description;

        $category->shop_id = $request->shop_id;

        $category->save();

            return redirect()->route("category.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("category.index")->with('success_message','The Category was successfully deleted');
    }

    // vienos kategorijos PDF generavimas
    public function generateCategoryPDF(Category $category) {

        view()->share('category', $category);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_category_template", $category);

        return $pdf->download("category".$category->id.".pdf");

    }

    // visu kategoriju PDF generavimas
    public function generatePDF() {


        $categories = Category::all();

        view()->share('categories', $categories);

        $pdf = PDF::loadView("pdf_templateC", $categories);

        // galima pervadinti failo pavadinimus
        return $pdf->download("categories.pdf");

    }
}
