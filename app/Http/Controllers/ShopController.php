<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Category;
use Validator;
use Illuminate\Http\Request;

use PDF;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::sortable()->paginate(10);
        return view("shop.index", ["shops" => $shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view ("shop.create", ["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //{

    //     $input = [
    //         'shopTitle' => $request->shopTitle,
    //         'shopDescription' => $request->shopDescription,
    //         'shopEmail' => $request->shopEmail,
    //         'shopPhone' => $request->shopPhone,
    //         'shopCountry' => $request->shopCountry,
    //     ];

    //     $rules = [
    //         'shopTitle' => 'required|max:255',
    //         'shopDescription' => 'required|min:5',
    //         'shopEmail' => 'required|email|max:255',
    //         'shopPhone' => 'required|numerics|digits:11',
    //         'shopCountry' => 'min:3|max:50',
    //     ];

    //     $validator = Validator::make($input, $rules);

    //     if($validator->passes()) {

    //         $shop = new Shop;
    //         $shop-> title = $request->shopTitle;
    //         $shop-> description = $request->shopDescription;
    //         $shop-> email = $request->shopEmail;
    //         $shop-> phone = $request->shopPhone;
    //         $shop-> country = $request->shopCountry;

    //         $shop->save();

    //         $success = [
    //             'message' => '[Back-End] Shop added successfully',
    //             'shopID' => $shop->id,
    //             'shopTitle' => $shop->title,
    //             'shopDescription' => $shop->description,
    //             'shopPhone' => $shop->phone,
    //             'shopCountry' => $shop->country,
    //         ];

    //         $success_json = response()->json($success);

    //         return $success_json;
    //     }

    //     $error = [
    //         'error' => $validator->messages()->get("*")
    //     ];

    //     $error_json = response()->json($error);

    //     return $error_json;

   {

    $shop=new Shop;

    $shop->title =$request->title ;
    $shop->description=$request->description;
    $shop->email =$request->email ;
    $shop->phone =$request->phone ;
    $shop->country =$request->country ;

    $validateVar = $request->validate([

        'title' => 'required',
        'description' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'country' => 'required',
        ]);


    $shop->save();

    return redirect()->route("shop.index");
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view("shop.show",["shop"=>$shop]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view("shop.edit", ["shop"=>$shop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->title =$request->title ;
        $shop->description=$request->description;
        $shop->email =$request->email ;
        $shop->phone =$request->phone ;
        $shop->country =$request->country ;

        //$validateVar = $request->validate([

            //'title' => 'required|min:6|max:225|alpha',
            //'description' => 'required|min:6|max:500|alpha',
            //'email' => 'required|max:20',
            //'phone' => 'required|numeric|ize:11',
            //'country' => 'required|min:6|max:30|alpha',
           // ]);


        $shop->save();

        return redirect()->route("shop.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route("shop.index")->with('success_message','The Shop was successfully deleted');
    }

    // vieno shopo PDF generavimas
    public function generateShopPDF(Shop $shop) {

        view()->share('shop', $shop);

        //sukuria vaizda PFD faile- atvaizduoja
        $pdf = PDF::loadView("pdf_shop_template", $shop);

        return $pdf->download("shop".$shop->id.".pdf");

    }

    // visu shop PDF generavimas
    public function generatePDF() {


        $shops = Shop::all();

        view()->share('shops', $shops);

        $pdf = PDF::loadView("pdf_templateS", $shops);

        // galima pervadinti failo pavadinimus
        return $pdf->download("shops.pdf");

    }
}
