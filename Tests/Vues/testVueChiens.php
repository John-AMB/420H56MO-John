<?php

require_once 'Framework/Vue.php';
$chiens = [
    [
        'id' => '991',
        'nom' => 'Testeur1',
        'sexe' => 'male',
        'date_de_naissance' => '2017-12-31',
        'vet_id' => '1',
        'responsable_id' => '1'
    ],
    [
        'id' => '992',
        'nom' => 'Testeur2',
        'sexe' => 'femelle',
        'date_de_naissance' => '2004-12-31',
        'date' => '2017-12-31',
        'vet_id' => '2',
        'responsable' => '3'
    ]
];
$vue = new Vue('index','Chiens');
$vue->generer(['chiens' => $chiens]);

