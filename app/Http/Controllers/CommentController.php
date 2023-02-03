<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\GuestBook  $guestBook
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(GuestBook $guestBook)
    {
        return CommentResource::collection($guestBook->comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentStoreRequest  $request
     * @param  \App\Models\GuestBook  $guestBook
     * @return \App\Http\Resources\CommentResource
     */
    public function store(CommentStoreRequest $request, GuestBook $guestBook)
    {
        $comment = $guestBook->comments()->create($request->safe()->all());

        return new CommentResource($comment);
    }
}
