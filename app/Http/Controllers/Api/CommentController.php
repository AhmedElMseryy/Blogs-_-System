<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResourse;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $comments = Comment::find(4);
        if ($comments) {
            return ApiResponse::sendResponse(200, 'comments Retrived successfuly', new CommentResourse($comments));
        }
        return ApiResponse::sendResponse(200, 'comments Not Found', []);
    }
}
