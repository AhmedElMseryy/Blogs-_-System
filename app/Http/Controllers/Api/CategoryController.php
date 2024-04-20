<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $category = Category::all();
        if (count($category) > 0) {
            return ApiResponse::sendResponse(200, 'categories Retrived successfuly',  CategoryResource::collection($category));
        }
        return ApiResponse::sendResponse(200, 'categories Not Found', []);
    }
}
