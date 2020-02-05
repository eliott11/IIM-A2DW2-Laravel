<?php

use App\Post;

class OneToOne {

    //One to One
    //Méthode du model User (app/User.php)
    public function profilePicture() {
        // Par convention, le model ProfilePicture à en base une colonne "user_id"
        return $this->hasOne( 'App\ProfilePicture' );
    }

    //Inverse du One to one =>
    //Méthode du model ProfilePicture (app/ProfilePicture.php)
    public function user() {
        // Par convention, le model ProfilePicture à en base une colonne "user_id"
        return $this->belongsTo( 'App\User' );
    }

}


class OneToMany{

    //One to Many
    //Méthode du model User (app/User.php)
    public function posts() {
        // Par convention, le model Post à en base une colonne "user_id"
        return $this->hasMany( 'App\Post' );
    }

    //Inverse du One to Many =>
    //Méthode du model Post (app/Post.php)
    public function user() {
        // Par convention, le model Post à en base une colonne "user_id"
        return $this->belongsTo( 'App\User' );
    }

}

class ManyToMany{

    //Many to Many
    //Méthode sur la table Posts
    public function tags(){
        return $this->belongsToMany('App\Post');
    }

    //Inverse du Many to Many
    //Méthode sur la table Posts
    public function posts(){
        return $this->belongsToMany('App\Tag');
    }

}

$id = 0;


// Fonction helper auth() de Laravel qui permet de récupérer l'utilisateur connecté
$user = auth()->user();

// One to Many -> On récupère le model ProfilePicture de l'utilisateur
$profilePicture = $user->profilePicture;

// One Has Many OU Many To Many
$comments = $post->posts;

//En utilisant directement la méthode, on peut se servir du Query Builder de Laravel
$comments = $post->posts()->where('title', "Un titre")->get();

