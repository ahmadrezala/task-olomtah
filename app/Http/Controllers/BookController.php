<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Repository\BookRepository;

class BookController extends Controller
{

    private BookRepository $bookRepository;



    public function __construct()
    {
       $this->bookRepository = app()->make(BookRepository::class);

    }


   public function store(BookRequest $request)
   {
       return response()
       ->json([

           'Book'=>  $this->bookRepository->create($request->validated())
       ]);


   }


   public function show($book)
   {
       return response()
       ->json([
           'tag'=>$this->bookRepository->show($book)
       ]);
   }


   public function update($book,BookRequest $request)
   {


       return response()
       ->json([
           'book'=>$this->bookRepository->update($book ,$request->validated())
       ]);
   }



   public function filter(Request $request){
    // dd($request->all());

    return $this->bookRepository->filter($request);
   }

}
