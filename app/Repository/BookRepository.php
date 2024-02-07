<?php

namespace App\Repository;


use App\Models\Book;
use App\Repository\RepositoryInterface;
use App\Repository\FilterRepositoryInterface;





class BookRepository implements RepositoryInterface, FilterRepositoryInterface{

    private Book $book;

    public function __construct()
    {
        $this->book = app()->make(Book::class);
    }



    public function create($data)
    {

      return  $this->book->create($data);
    }




    public function show($data)
    {
        return $this->book->query()->where('id' , $data)->get();


    }



    public function update($id ,$data)
    {
        $book = $this->book->query()->where('id' , $id)->update($data);

        return $this->book->query()->where('id' , $book)->get();


    }


    public function filter($request){

        // dd($this->book->tags()->wherePivot('name',$data));

    //    $this->book->query()->tags()->wherePivot('tag_id','');

    $tag = $request->input('tag');

    $books = Book::when($tag, function ($query) use ($tag) {
        return $query->whereHas('tags', function ($q) use ($tag) {
            $q->where('name', $tag);
        });
    })->get();

    return response()->json(['books' => $books]);


    }





}
