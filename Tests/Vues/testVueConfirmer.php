<?php

require_once 'Framework/Vue.php';
$responsables = [
        'id' => '1',
        'nom' => 'Ghislain',
        'mot_de_passe' => 'hello',
        'numero_de_telephone' => '(012) 345-6789',
        'efface' => '0',
    ];
$vue = new Vue('Confirmer', 'AdminResponsables');
$vue->generer(['responsables' => $responsables]);
