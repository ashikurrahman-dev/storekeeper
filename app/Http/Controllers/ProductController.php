<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view("backend.pages.products.index", compact('products'));
    }

    public function create()
    {
        return view("backend.pages.products.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "product_name"      => 'required',
            "price"             => 'required',
            "stock"             => 'required',
            "thumbnail"         => 'required|image|mimes:jpg,png,jpeg',
            "short_desc"        => 'required|string|max: 255',
            "description"       => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $thumbnailImage = 'product_' . time() . '.' . $thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('uploads/product'), $thumbnailImage);
        }

        $data = [
            'product_name'  => $request->input('product_name'),
            'product_slug'  => Str::slug($request->input('product_name')),
            'price'         => $request->input('price'),
            'stock'         => $request->input('stock'),
            'short_desc'    => $request->input('short_desc'),
            'description'   => $request->input('description'),
            'thumbnail'     => $thumbnailImage,
        ];

        DB::table('products')->insert($data);

        return redirect()->route('product.index')->with('success', 'Product has been successfully added.');
    }

    public function edit($id)
    {
        // $product = DB::table('products')
        //       ->where('id', $id)
        //       ->first();

        $product = DB::table('products')->find($id);
        return view("backend.pages.products.edit", compact('product'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            "product_name"      => 'required',
            "price"             => 'required',
            "stock"             => 'required',
            "thumbnail"         => 'nullable|image|mimes:jpg,png,jpeg',
            "short_desc"        => 'required|string|max: 255',
            "description"       => 'nullable|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $thumbnailImage = 'product_' . time() . '.' . $thumbnail->getClientOriginalExtension();

            $request->thumbnail->move(public_path('uploads/product'), $thumbnailImage);
            $imagePath = public_path('uploads/product/') . $request->old_thumbanil;
            unlink($imagePath);
        } else {
            $thumbnailImage = $request->old_thumbanil;
        }


        $data = [
            'product_name'  => $request->input('product_name'),
            'product_slug'  => Str::slug($request->input('product_name')),
            'price'         => $request->input('price'),
            'stock'         => $request->input('stock'),
            'short_desc'    => $request->input('short_desc'),
            'description'   => $request->input('description'),
            'thumbnail'     => $thumbnailImage,
        ];


        DB::table('products')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('product.index')->with('success', 'Product has been successfully updated.');
    }


    public function destroy($id)
    {
        $product = DB::table('products')->find($id);
        if ($product) {
            DB::table('products')->where('id', $id)->delete();
            unlink(public_path('uploads/product/' . $product->thumbnail));
        }

        return redirect()->route('product.index')->with('success', 'Product has been successfully delete.');
    }

    public function show($id)
    {
    }
}
