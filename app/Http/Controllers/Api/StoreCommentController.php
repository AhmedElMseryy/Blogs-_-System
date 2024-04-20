<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CommentRequest $request)
    {
        $data = $request->validated();
        $record = Comment::create($data);
        if ($record) {
            return ApiResponse::sendResponse(201, 'sent successfully', []);
        }
    }
}
