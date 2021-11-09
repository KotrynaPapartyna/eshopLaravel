<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $productTitle = $request->productTitle; // pavadinimas

        $filterProducts = Product::all();

        if($productTitle) {
            //vykdoma filtracija sortable()
            $products = Product::sortable()->where("title", $productTitle)->paginate(5); //sortable()
        } else {
            $products = Product::sortable()->paginate(5); //sortable()
        }

        return view("product.index",["products"=>$products, "filterProducts" => $filterProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $categories= Category::all();

        return view("product.create", ["product"=>$product, "categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories=Category::all();
        $categories_count=$categories->count();

        $product=new Product;

        $product->title =$request->title ;
        $product->excertpt =$request->excertpt;
        $product->description=$request->description;
        $product->price =$request->price;
        //$product->image =$request->image;

        if ($request->has('image')) {

            $imageName=time().'.'.$request->logo->extension();
            $product->logo= '/images/'.$imageName;

            $request->logo->move(public_path('images'), $imageName);
            } else {
                $product->logo= '/images/placeholder.png';
            }

        $product->category_id =$request->category_id;

        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'excertpt ' => 'required|min:8|max:200',
            'description ' => 'required|min:8|max:400',
            'price ' => 'required|integer',
            'image  ' => 'mimes:jpeg,jpg,png,gif|required|max:10000',

            ]);

        $product->save();

        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories=$product->productCategories;

        return view("product.show",["product"=>$product, "categories"=> $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all()->sortBy("id", SORT_REGULAR, true);
        return view("product.edit", ["product"=>$product, "categories"=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title =$request->title ;
        $product->excertpt =$request->excertpt;
        $product->description=$request->description;
        $product->price =$request->price;
        $product->image =$request->image;
        $product->category_id =$request->category_id;

        $validateVar = $request->validate([

            'title' => 'required|min:6|max:225|alpha',
            'excertpt ' => 'required|min:8|max:200',
            'description ' => 'required|min:8|max:400',
            'price ' => 'required|integer',
            'image  ' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

        $product->save();

        return redirect()->route("product.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("product.index")->with('success_message','The Product was successfully deleted');
    }

    // vieno shopo PDF generavimas
    public function generateProductPDF(Product $product) {

        view()->share('product', $product);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_product_template", $product);

        return $pdf->download("product".$product->id.".pdf");

    }

    // visu shop PDF generavimas
    public function generatePDF() {


        $products = Product::all();

        view()->share('products', $products);

        $pdf = PDF::loadView("pdf_templateP", $products);

        // galima pervadinti failo pavadinimus
        return $pdf->download("products.pdf");

    }

}
