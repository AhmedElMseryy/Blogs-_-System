<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $category_id = null)
    {
        $blog = Blog::where('category_id', $category_id)->get();
        if (count($blog) > 0) {
            return ApiResponse::sendResponse(200, 'Blogs Retrived successfuly',  BlogResource::collection($blog));
        }
        return ApiResponse::sendResponse(200, 'Blogs Not Found', []);
    }
}
