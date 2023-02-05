<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestBookResource;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $guestBooks = GuestBook::all(['uuid', 'name']);

        return GuestBookResource::collection($guestBooks);
    }
}
