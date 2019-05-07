<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JmBatiInterimBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of ArtisanController
 *
 * @author developpeur
 */
class ArtisanController extends Controller {
    //put your code here
     public function accueilAction()
    {
        return $this->render('@JmBatiInterim/Artisan/accueilArtisan.html.twig');
    }
}
