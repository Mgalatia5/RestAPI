<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            DB::beginTransaction();
            $product = Product::all();
            DB::commit();
            if ($product) :
                return response()->json([
                    'status' => 200,
                    'success' => $product,
                ]);
            else :
                return response()->json([
                    'status' => 404,
                    'error' => 'No products found',
                ]);
            endif;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 404,
                'error' => 'No products found',
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'price' => 'required',
            'description' => 'required|max:250',
            'image' => 'required|mimes:png,jpg,jpeg,avif,web|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
            ]);
        }
        try {
            if ($image = $request->file('image')) {
                $productImage = 'product_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move('assets/images/', $productImage);
                $imageName = 'assets/images/' . $productImage;
            } else {
                $imageName = null;
            }
            DB::beginTransaction();
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->image = $imageName;
            $save = $product->save();
            DB::commit();
            if ($save) :
                return response()->json([
                    'status' => 201,
                    'message' => 'Product created successfully',
                ]);
            else :
                return response()->json([
                    'status' => 400,
                    'message' => 'Product creation failed'
                ]);
            endif;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'Product creation failed'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($pId)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($pId);
            DB::commit();
            if ($product) :
                return response()->json([
                    'status' => 200,
                    'success' => $product,
                ]);
            else :
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found',
                ]);
            endif;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'Product creation failed'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'price' => 'required',
            'description' => 'required|max:250',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors(),
            ]);
        }
        try {
            DB::beginTransaction();
            $product = Product::find($pId);
            DB::commit();
            if (!$product) :
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found',
                ]);
            else :
                $product->name = $request->name;
                $product->price = $request->price;
                $product->description = $request->description;

                if ($image = $request->file('image')) {
                    $productImage = 'product_' . date('YmdHis') . "." . $image->getClientOriginalExtension();
                    $image->move('assets/images/', $productImage);
                    $product->image = 'assets/images/' . $productImage;
                }
                $save = $product->save();
                DB::commit();
                if ($save) :
                    return response()->json([
                        'status' => 200,
                        'product' => 'Product updated successfully',
                    ]);
                else :
                    return response()->json([
                        'status' => 404,
                        'message' => 'Product not found',
                    ]);
                endif;
            endif;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'Product update failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pId)
    {
        try {
            DB::beginTransaction();
            $product = Product::find($pId)->delete();
            DB::commit();
            if ($product) :
                return response()->json([
                    'status' => 200,
                    'product' => 'Product deleted successfully',
                ]);
            else :
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found',
                ]);
            endif;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 400,
                'message' => 'Product deletion failed'
            ]);
        }
    }
}
