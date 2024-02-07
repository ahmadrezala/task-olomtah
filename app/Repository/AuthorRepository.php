<?php

namespace App\Repository;


use App\Models\Author;
use App\Repository\RepositoryInterface;
use App\Repository\FilterRepositoryInterface;





class AuthorRepository implements RepositoryInterface, FilterRepositoryInterface{

    private Author $author;

    public function __construct()
    {
        $this->author = app()->make(Author::class);
    }



    public function create($data)
    {

      return  $this->author->create($data);
    }




    public function show($data)
    {
        return $this->author->query()->where('id' , $data)->get();


    }


    public function filter($data){


    }


}
