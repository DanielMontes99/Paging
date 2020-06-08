<?php

namespace Controllers;

use Models\post;
use Models\libro;

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

    public function postPost($datos) {
        $pos = new post();
        $libro = new libro();

        $nLibro = $libro->select(['titulo'])
                        ->where([['ISBN',$datos['isbn']]])
                        ->get();

        $titulo = json_decode($nLibro,true);
        $lol = $titulo["0"];
        
        $result = $pos->into([['userId'],['isbn'],['titulo'],['stars'],['spoiler'],['review']])
                      ->values([[$datos['userId']],[$datos['isbn']],[$lol["titulo"]],[$datos['stars']],[$datos['spoiler']],[$datos['review']]])
                      ->insert();
        
        return $result;
    }
}