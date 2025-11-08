<?php

namespace App\Controllers;
use App\Models\Article;

class ArticleController
{

    public function index()
    {
        $article = new Article();
        $posts = $article->getData();
        require 'views/posts_view.php';
    }

    public function show(string $id)
    {
        var_dump($id);
        require 'views/post_view.php';
    }

    public function showPage(string $title,string $id,string $page): void
    {
        echo "$id,$title,$page";
    }
}