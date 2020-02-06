<?php
//Récupérer l'utilisateur connecté
$user = auth()->user();

//Générer une url vers votre application
$url = route('nomdelaroute');

//Rediriger vers une autre url
redirect()->route('nomdelaroute');
