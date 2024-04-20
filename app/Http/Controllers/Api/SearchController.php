<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResourse;
use App\Models\Comment;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $comment = Comment::when($word != null, function ($q) use ($word) {
            $q->where('name', 'like', '%' . $word . '%');
        })->latest()->get();

        if (count($comment) > 0) {
            return ApiResponse::sendResponse(200, 'search completed', CommentResourse::collection($comment));
        }
        return ApiResponse::sendResponse(200, 'No Matching Data', []);
    }
}
