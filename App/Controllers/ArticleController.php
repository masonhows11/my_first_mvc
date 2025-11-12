<?php

namespace App\Controllers;

//use App\Models\Article;

class ArticleController
{

    public function index()
    {
//        $article = new Article();
//        $posts = $article->getData();
        require 'views/posts_view.php';
    }

    public function show(string $id)
    {
        var_dump($id);
        require 'views/post_view.php';
    }

    public function page(string $title = null,int $id = null,string $page = null): void
    {
        echo "$id,$title,$page";
    }
}