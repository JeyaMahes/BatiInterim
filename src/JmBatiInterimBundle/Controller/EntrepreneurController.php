<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JmBatiInterimBundle\Controller;

/**
 * Description of EntrepreneurController
 *
 * @author developpeur
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EntrepreneurController extends Controller {

    public function indexAction()
    {
        return $this->render('@BatInterim/Entrepreneur/accueilEntrepreneur.html.twig');
    }
}