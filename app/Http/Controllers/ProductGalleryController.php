<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $items = ProductGallery::where('products_id', $product->id)->get();
        return view('pages.gallery.index', [
            'items' => $items,
            'product' => $product
        ])->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('pages.gallery.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, Product $product)
    {
        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');

                ProductGallery::create([
                    'products_id' => $product->id,
                    'url' => $path
                ]);
            }
        }

        return redirect()->route('product.gallery.index', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGallery $productGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();
        // var_dump($gallery);
        // die();
        return redirect()->route('product.gallery.index', $gallery->products_id);
    }
}
