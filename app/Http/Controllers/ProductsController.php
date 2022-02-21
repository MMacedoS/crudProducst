<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_tag;
use App\Models\Tag;

class ProductsController extends Controller
{
    //

    public function index()
    {
        $products = Product::all();
        return view('product.index',['products' => $products]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('product.create',['tags' => $tags]);
    }

    public function add(Request $request)
    {
        
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtolower('now')). "." . $extension;

            $requestImage->move(public_path('img/product'),$imageName);
            $product->image = $imageName;
        }
        

            $product->save();
            foreach ($request->tags as $key => $value) {
               
                $product->tags()->attach($value);
            }
            return back()->withStatus(__('produto criado com sucesso.'));
    }

    public function editById($id)
    {
        $product = Product::FindOrFail($id);
        $tags = Tag::addSelect(['TagSelected' => Product_tag::select('tag_id')->whereColumn('tag_id','id')->where('product_id',$id)])->get();
        
        return view('product.edit',['product' => $product, 'tags' => $tags]);
    }

    public function update(Request $request)
    {    
        $product = Product::FindOrFail($request->id);
        $product->tags()->detach();
        try {
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
           if(!file_exists("/img/noticias/".$request->image))
           {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtolower('now')). "." . $extension;

            $requestImage->move(public_path('img/product'),$imageName);
            $data['image'] = $imageName;               
           }else
           {
            $data['image'] = $request->fotoAntiga;
           }
        }
        
        Product::findOrFail($request->id)->update($data);

        foreach ($request->tags as $key => $value) {
               
            $product->tags()->attach($value);
        }
       
        return back()->withStatus(__('produto atualizado com sucesso.'));

          //code...
        } catch (\Throwable $th) {
            return back()->withStatus(__('erro =>'.$th->getMessage()));
            
         }
     
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return back()->withStatus(__('Product deletado com sucesso!'));
    }
}
