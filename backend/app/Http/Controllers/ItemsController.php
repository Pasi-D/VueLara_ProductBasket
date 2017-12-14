<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class ItemsController extends Controller
{
    public function postItem(Request $request){
    	$item = new Items();

        $expl = explode(',', $request->image);

        $decode = base64_decode($expl[1]);
        if(str_contains($expl[0],'png')){
            $exte = 'png';
        }else{
            $exte = 'jpg';
        }

        $currentTime = Carbon::now()->timestamp;
        $filename = $currentTime.'.'.$exte;

        $filepath = public_path().'/'.$filename;

        file_put_contents($filepath, $decode);

    	$item->name = $request->input('name');
    	$item->quantitiy = $request->input('quantity');
        $item->image = $filename;
    	$item->price = $request->input('price');
    	$item->save();

    	return response()->json(['message'=>$item],201);
    }

    public function getItems(){
    	$allItems = Items::all();

    	return response()->json(['allitems'=>$allItems],200);
    }

    public function getItem($id)
    {
        $item = Items::find($id);

        $response = [
            'item' => $item
        ];

        return response() -> json($response,200);
    }

    public function deleteItems($id){

    	$item = Items::find($id);
    	if (!$item) {
    		return response()->json(['msg'=>"Item not found"],404);
    	}

    	$item->delete();
    	return response()->json(['msg'=>"Item deleted succesfully"],201);
    }

    public function editItems(Request $request, $id)
    {
    	$item = Items::find($id);
    	if (!$item) {
    		return response()->json(['msg'=>"Item not found"],404);
    	}

    	$item->name = $request->input('name');
    	$item->quantitiy = $request->input('quantitiy');
    	$item->price = $request->input('price');
    	$item->save();

    	return response()->json(['message'=>$item],200);

    }

}
