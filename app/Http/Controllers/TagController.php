<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests\TagRequest;
use App\Repository\TagRepository;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private TagRepository $tagRepository;


     public function __construct()
     {
        $this->tagRepository = app()->make(TagRepository::class);

     }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {

        return response()
            ->json([
                'tag'=> $this->tagRepository->create($request->validated())
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($tag)
    {


        return response()
        ->json([
            'tag'=>$this->tagRepository->show($tag)
        ]);

    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */

}
