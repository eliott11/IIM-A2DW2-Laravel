<!-- Dans un fichier layout, on pose un bloc remplissable avec @yield -->
@yield('content')

<!--
 Dans un fichier enfant, on appelle de layout avec @extends('chemin.du.layout')
 On peut ainsi remplir les blocs de contenu grâce à la directive @section('nom-du-bloc)')
    -->
@extends('layouts.app')
<!-- Seul la string sera affichée -->
@section('title', 'About')

<!-- Si on ne remplis pas le deuxième argument, il faut fermer la directive avec un @endsection -->
@section('content')
    <h1>{{$pageTitle}}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius fuga fugit ipsum. Ea fugiat in iste itaque laborum
        laudantium nam nemo nobis quidem? Ad facere officiis pariatur quam, repellat tempore.</p>

    @if(count($fruits) === 1)
        <p>Il n'y a qu'un fruit dans mon panier</p>
    @elseif(count($fruits) > 1)
        <p>Il y a {{count($fruits)}} fruits dans mon panier</p>
    @else
        <p>Il n'y a pas de fruit dans mon panier</p>
    @endif


    @unless(count($fruits) === 0)
        <p>J'ai des fruit dans mon panier</p>
    @endunless


    @isset($fruits)
        <p>La variable fruits est définis</p>
    @endisset

    @empty($fruits)
        <p>Le panier de fruit est vide</p>
    @endempty


    @auth
        <p>Connecté</p>
    @endauth

    @guest
        <p>Pas connecté</p>
    @endguest

    <ul>
        @foreach ($fruits as $fruit)
            <li>{{$fruit}}</li>
        @endforeach
    </ul>
    <ul>
        @forelse ($fruits as $fruit)
            <li>{{$fruit}}</li>
        @empty
            <li>Il n'y à pas de fruit dans le panier</li>
        @endforelse
    </ul>

@endsection
