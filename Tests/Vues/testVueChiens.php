<?php

require_once 'Vue/Vue.php';
$chiens = [
    [
        'id' => '991',
        'nom' => 'nom Test 1',
        'sexe' => 'male',
        'date_de_naissance' => '2017-12-31',
        'vet_id' => '1',
        'responsable_id' => '1'
    ],
    [
        'id' => '992',
        'titre' => 'titre Test 2',
        'sous_titre' => 'sous-titre Test 2',
        'utilisateur_id' => '111',
        'date' => '2017-12-31',
        'texte' => 'texte Test 2',
        'type' => 'type Test 2'
    ]
];
$vue = new Vue('Chiens');
$vue->generer(['chiens' => $chiens]);

