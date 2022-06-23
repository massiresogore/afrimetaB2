<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;

class MainController extends Controller
{
    public function homePage()
    {
        $this->render('main/index');
    }

    public function notFoundHandler()
    {
        $title = array('404' => 'Cette Page n\'existe pas -) ');
        $this->render('notFoundPage', compact('title'));
    }


    public function listeDesMembres()
    {
        $utilisateurModel = new UtilisateurModel;

        // $utilisateurModel->setNom("Alexi")
        //                     ->setEmail('alexi@gmail.com')
        //                     ->setActive(1);
        //                     $utilisateurModel->create();

        // on determine sur quel page on se trouve
        if (isset($_GET["page"]) && !empty($_GET["page"])) {
            $currentPage = (int) strip_tags($_GET["page"]);
        } else {
            $currentPage = 1;
        }

        // on determine le nombre total dutilisateur
        $nombreUtilisateur = $utilisateurModel->tableCount();
        $nombreUtilisateur = (int) $nombreUtilisateur->nb;
        // var_dump($nombreUtilisateur);

        //on determine le nombre dutilisateur  par page
        $parPage = 16;

        //on calcul le nombre de page total
        $pages = ceil($nombreUtilisateur / $parPage);


        //calcul le premier utilisateur de la page
        $premier = ($currentPage * $parPage) - $parPage;
        $utilisateurs =  $utilisateurModel->findLimit($premier, $parPage);


        $this->render('membres/index', compact('utilisateurs', 'pages', 'currentPage'));
    }
}