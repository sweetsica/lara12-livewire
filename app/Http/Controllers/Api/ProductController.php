<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Lấy danh sách tất cả sản phẩm
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'data' => $products
        ], Response::HTTP_OK);
    }

    /**
     * Thêm một sản phẩm mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm được tạo thành công.',
            'data' => $product
        ], Response::HTTP_CREATED);
    }

    /**
     * Hiển thị chi tiết một sản phẩm
     */
    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Cập nhật thông tin sản phẩm
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'detail' => 'sometimes|required|string',
        ]);

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được cập nhật.',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Xóa một sản phẩm
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã bị xóa.'
        ], Response::HTTP_OK);
    }
}
