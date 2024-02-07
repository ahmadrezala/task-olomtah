<?php

namespace App\Repository;

use App\Models\Tag;
use App\Repository\RepositoryInterface;




class TagRepository implements RepositoryInterface{

    private Tag $tag;

    public function __construct()
    {
        $this->tag = app()->make(Tag::class);
    }



    public function create($data)
    {
      return  $this->tag->create($data);
    }


    public function show($id)
    {
        return $this->tag->query()->where('id', $id)->get();
    }



}
