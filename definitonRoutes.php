<?php

Route::view( '/testView', 'welcome');

//Une requête HTTP GET sur un uri donné.
Route::get( '/test1', function () {
    return "hello from the GET test route";
} );

Route::get( '/test2/{message?}', function ( $message = null ) {
    if ( $message === null ) {
        return "the message is empty";
    }

    return $message;
} );

//Toutes les formes de requêtes disponibles
Route::post( "testpost", function () {
    return "test from a post request";
} );
Route::put( "testput", function () {
    return "test from a put request";
} );
Route::patch( "testpatch", function () {
    return "test from a patch request";
} );
Route::delete( "testdelete", function () {
    return "test from a delete request";
} );
Route::options( "testoptions", function () {
    return "test from an option request";
} );


//Nommer une route
Route::get( 'namedRoute', function () {
    return "I'm a named route";
} )->name( 'namedRoute' );

Route::get( 'callingNamedRoute', function () {
    $url = route( 'namedRoute' );

    //return redirect()->route('namedRoute');
    return "<a href='$url'>Linked to the named route</a>";
} );


//Grouper des routes :
//Toutes les routes auront le même préfix
//Toutes les routes auront le même début de nomination
Route::prefix( 'testGrouped' )->name( 'testGrouped.' )->group( function () {
    Route::get( 'test1', function () {
        //Match sur l'URL /testGrouped/test1
        return "test from test1";
    } )->name( 'test1' );

    Route::get( 'test2', function () {
        //Match sur l'URL /testGrouped/test2
        return redirect()->route( 'testGrouped.test1' );
    } );
} );

//debug
Route::get( 'test-dd', function () {
    dump( auth()->user());
    dd( "Une string" );
} );

c


