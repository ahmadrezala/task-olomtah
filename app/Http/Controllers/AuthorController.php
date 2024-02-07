<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Repository\AuthorRepository;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private AuthorRepository $authorRepository;



     public function __construct()
     {
        $this->authorRepository = app()->make(AuthorRepository::class);

     }


    public function store(AuthorRequest $request)
    {
        return response()
        ->json([

            'author'=>  $this->authorRepository->create($request->validated())
        ]);


    }


    public function show($author)
    {
        return response()
        ->json([
            'tag'=>$this->authorRepository->show($author)
        ]);
    }


}
