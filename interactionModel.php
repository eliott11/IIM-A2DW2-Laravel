<?php
$id = 0;

//Récupération d'un model grâce son ID
$post = Post::find($id);

//Récupération de tout les models présent en base
$posts = Post::all();

//Recupération de certains models
$posts = Post::where('title', "Un titre d'article")->get();

//Recupération d'un model en particulier
$posts = Post::where('title', "Un titre d'article")->first();

//Insertion d'un model
$post = new Post();
$post->title = "Un premier article";
$post->content = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam assumenda facere harum ipsum maxime modi nisi obcaecati saepe totam? Adipisci aliquid aperiam aspernatur deleniti dignissimos facere qui quia ratione.";
$post->save(); //Retourne un booléen

//Modification d'un model
$post = Post::find($id);
$post->title = "Un nouveau titre";
$post->save(); //Retourne un booléen

//Suppression d'un model
$post = Post::find($id);
$post->delete();

//Suppression de plusieurs models d'un coup
$postsDeleted = Post::where('title', "Un titre")->delete();

$postsDeleted;


