<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GuestBook $guestBook)
    {
        return CommentResource::collection($guestBook->comments);
    }
}
