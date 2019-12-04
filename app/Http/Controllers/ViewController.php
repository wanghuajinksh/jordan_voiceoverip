<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ViewController extends Controller
{
    function viewHome(Request $request){
        
        $pages = DB::table('pages')->get();
      
        return view('home', compact('pages'));
    }
    function ViewProducts(Request $request){
        $data = DB::table('products')->get();
        $pages = DB::table('pages')->get();
        return view('products',compact('data', 'pages'));
    }
    function addProduct(Request $request){
        return view('add');
    }
    function insertProduct(Request $request){
        $data = $request->products;
        $page_id = $request->page_id;
        DB::table('products')->where('page_id', "=", $page_id)->delete();
        foreach($data as $item){

            $new_product = Array(
                "name"=>$item['name'],
                "price"=>$item['price'],
                "tprefix"=>$item['tprefix'],
                "page_id"=> $page_id
            );
           
            DB::table('products')->insert($new_product);
        }
        
        return array("status"=>1);
    }
    function getProducts(Request $request, $id){
        if($id==0){
            $products = DB::table("products")->get();
        }else{
            $products = DB::table("products")->where("page_id", "=", $id)->get();
        }
        
        return response()->json($products);
    }
    function deleteProduct(Request $request){
        $data = $request->id;
        DB::table('products')->where('id', "=", $data)->delete();
        return response()->json("ok");
    }
    function editProduct(Request $request){
        $data = $request->all();
        $update_product = array(
            "name" => $data['name'],
            "price" => $data['price']
        );
        DB::table("products")->where("id", "=", $data['id'])->update($update_product);
        return array("status"=>1);
    }
    function addNewProduct(Request $request){
        $data = $request->all();
        $products = $data['products'];
        DB::table('products')->truncate();
        for($i = 0 ; $i < count($products) ; $i++){
            $new_product = array(
                "name" => $products[$i]['name'],
                "price" => $products[$i]['price'],
                "page_id" => $products[$i]['page_id']
            );
            DB::table("products")->insert($new_product);
        }
        return array("status"=>1);
    }
    function submitPage(Request $request){
        $data = $request->all();
        $new_page = array(
            "name"=>$data['name']
        );
        DB::table("pages")->insert($new_page);
        return array("status"=>1);
    }
    function viewPage(Request $request, $id){
        
        $products = DB::table('products')->where("page_id", "=", $id)->get();
        return view('page_product', compact('products', 'id'));
    }
    function getPageProducts(Request $request, $id){
        if($id==0){
            $products = DB::table("products")->get();
        }else{
            $products = DB::table("products")->where("page_id", "=", $id)->get();
        }
        
        return response()->json($products);
    }
}
