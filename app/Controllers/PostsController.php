<?php

namespace Controllers;

use Models\post;

class PostsController {
    public function __construct(){

    }

    public function getPosts($limit="") {
        $posts = new post();

        $result = $posts->select(['a.idPost','a.titulo','a.review','date_format(fecha,"%d/%m/%Y") as fecha','stars','spoiler','b.user_Alias'])
                        ->join('user b', 'a.userId=b.id')
                        ->orderBy([['a.fecha','DESC']])
                        ->limit($limit)
                        ->get();
        return $result;
    }

    //*
    public function myPosts($id) {
        $post = new post();
        $result = $post->select(['idPost','isbn','titulo','review','date_format(fecha,"%d/%m/%Y") as fecha','stars','spoiler'])
                       ->where([['userId',$id]])
                       ->orderBy([['fecha','DESC']])
                       ->get();
        
        return $result;
    }
}