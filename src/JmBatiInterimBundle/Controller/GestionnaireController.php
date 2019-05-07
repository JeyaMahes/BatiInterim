<?php

namespace JmBatiInterimBundle\Controller;

/**
 * Description of GestionnaireController
 *
 * @author developpeur
 */
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use JmBatiInterimBundle\Entity\Corpsmetier;
use JmBatiInterimBundle\Entity\Artisan;
use JmBatiInterimBundle\Entity\Entrepreneur;
use JmBatiInterimBundle\Form\CorpsmetierType;



class GestionnaireController extends Controller {
    
    public function indexAction()
    {
        return $this->render('@JmBatiInterim/Gestionnaire/indexGestionnaire.html.twig');
    }
    
    public function saisirArtisanAction(Request $request)
    {
        $repository_corpsmetier = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Corpsmetier');
        $corpsmetiers = $repository_corpsmetier->findAll();
       
        $artisan = new Artisan();
        $form = $this->createFormBuilder($artisan)
            ->add('nomArtisan', TextType::class)
            ->add('prenomArtisan', TextType::class)
            ->add('telephoneArtisan', TextType::class)
            ->add('adresseArtisan', TextType::class)
            ->add('cpArtisan',TextType::class)
            ->add('villeArtisan', TextType::class)
            ->add('dateNaissanceArtisan', BirthdayType::class)
            ->add('villeNaissanceArtisan', TextType::class)
            ->add('paysNaissanceArtisan', TextType::class)
            ->add('idcorpsmetier', ChoiceType::class , array('choices' => array ($corpsmetiers )))
            ->add('valider', SubmitType::class)
            ->add('annuler', ResetType::class)
            ->getForm();
        $form->handleRequest($request) ;
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager() ;           
            $artisan->setNomArtisan($form->get('nomArtisan')->getData());
            $artisan->setPrenomArtisan($form->get('prenomArtisan')->getData());
            $artisan->setTelephoneartisan($form->get('telephoneArtisan')->getData());
            $artisan->setAdresseartisan($form->get('adresseArtisan')->getData());
            $artisan->setCpartisan($form->get('cpArtisan')->getData());
            $artisan->setVilleartisan($form->get('villeArtisan')->getData());
            $artisan->setDateNaissanceArtisan($form->get('dateNaissanceArtisan')->getData());
            $artisan->setPaysNaissanceArtisan($form->get('paysNaissanceArtisan')->getData());
            $artisan->setPremiereconnexion(0);
            $artisan->setIdcorpsmetier($form->get('idcorpsmetier')->getData());
            $nom = $form->get('nomArtisan')->getData();
            $prenom = $form->get('prenomArtisan')->getData();
            $login = substr($nom, 0, 1);
            $login .= substr($prenom,0, 9);
            $artisan->setLoginartisan(strtolower($login));
            $em->persist($artisan);
            $isSuccess = 1;
            try {
                $em->flush();
            } catch(Exception $e) {
                if (!empty($e)) {
                    $isSuccess = 0;
                }
            }
            
            if ($isSuccess) {
                $this->addFlash(
                    'success',
                    'Ajouté avec succès !'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue.'
                );
            }
            
            return $this->render('@JmBatiInterim/Gestionnaire/saisirArtisan.html.twig',
            array('form'=>$form->createView(), 'data'=>$form->getData()));
  
        }
        return $this->render('@JmBatiInterim/Gestionnaire/saisirArtisan.html.twig',
        array('form'=>$form->createView()));
    }
    
    public function supprimerArtisanAction($id = null)
    {
        if(!empty($id)) {
            $em = $this->getDoctrine()->getManager();
            $artisanRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Artisan');
            $artisan = $artisanRepo->find($id);
            $artisan->setIsdeleted(1);
            $em->persist($artisan);
            $isSuccess = 1;
            try {
                $em->flush();
            } catch(Exception $e) {
                if (!empty($e)) {
                    $isSuccess = 0;
                }
            }
            
            if ($isSuccess) {
                $this->addFlash(
                    'success',
                    'Artisan supprimé avec succès !'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue.'
                );
            }
        }
        $artisanRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Artisan');
        $listeArtisan = $artisanRepo->findAll();
        return $this->render('@JmBatiInterim/Gestionnaire/supprimerArtisan.html.twig', array("artisan" => $listeArtisan));
    }
    
    public function saisirEntrepreneurAction(Request $request)
    {
        $repository_secteur = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Secteur');
        $secteur= $repository_secteur->findAll();
        $ent= new Entrepreneur();
        $form = $this->createFormBuilder($ent)
           
            ->add('raisonSociale', TextType::class)
            ->add('nomResponsable', TextType::class)
            ->add('prenomResponsable', TextType::class)
            ->add('telResponsable', TextType::class)
            ->add('telephoneEntreprise', TextType::class)
            ->add('adresseEntreprise', TextType::class)
            ->add('villeEntreprise', TextType::class)
            ->add('cpEntreprise', TextType::class)
           
            ->add('valider', SubmitType::class)
            ->add('annuler', ResetType::class)
            ->getForm();
        $form->handleRequest($request) ;
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager() ;
            $ent->setRaisonSociale($form->get('raisonSociale')->getData());
            $ent->setNomresponsable($form->get('nomResponsable')->getData());
            $ent->setPrenomresponsable($form->get('prenomResponsable')->getData());
            $ent->setTelresponsable($form->get('telResponsable')->getData());
            $ent->setTelephoneentreprise($form->get('telephoneEntreprise')->getData());
            $ent->setAdresseentreprise($form->get('adresseEntreprise')->getData());
            $ent->setCpEntreprise($form->get('cpEntreprise')->getData());
            $ent->setVilleentreprise($form->get('villeEntreprise')->getData());
            $ent->setPremiereconnexion(0);
            $nom = $form->get('nomResponsable')->getData();
            $prenom = $form->get('prenomResponsable')->getData();
            $login = substr($nom, 0, 1);
            $login .= substr($prenom,0, 9);
            $ent->setLoginentreprise(strtolower($login));
            $em->persist($ent);
            $isSuccess = 1;
            try {
                $em->flush();
            } catch(Exception $e) {
                if (!empty($e)) {
                    $isSuccess = 0;
                }
            }
            
            if ($isSuccess) {
                $this->addFlash(
                    'success',
                    'Ajouté avec succès !'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue.'
                );
            }
            return $this->render('@JmBatiInterim/Gestionnaire/saisirEntrepreneur.html.twig',
            array('form'=>$form->createView()));
        }
        return $this->render('@JmBatiInterim/Gestionnaire/saisirEntrepreneur.html.twig',array('form'=>$form->createView()));
    }
    
    public function supprimerEntrepreneurAction($id = null)
    {
        if(!empty($id)) {
            $em = $this->getDoctrine()->getManager();
            $entrepreneurRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Entrepreneur');
            $entrepreneur = $entrepreneurRepo->find($id);
            $entrepreneur->setIsdeleted(1);
            $em->persist($entrepreneur);
            $isSuccess = 1;
            try {
                $em->flush();
            } catch(Exception $e) {
                if (!empty($e)) {
                    $isSuccess = 0;
                }
            }
            
            if ($isSuccess) {
                $this->addFlash(
                    'success',
                    'Entrepreneur supprimé avec succès !'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue.'
                );
            }
        }
        $entrepreneurRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Entrepreneur');
        $listeEntrepreneur = $entrepreneurRepo->findAll();
        return $this->render('@JmBatiInterim/Gestionnaire/supprimerEntrepreneur.html.twig', array("entrepreneur" => $listeEntrepreneur));
    }
    
    public function ajouterCorpsMetierAction(Request $request) {
        $cm= new Corpsmetier();
        $em = $this->getDoctrine()->getManager();
        $repository_secteur=$em->getRepository('JmBatiInterimBundle:Secteur');
        $secteurs = $repository_secteur->findAll();
        $form = $this->createFormBuilder($cm)
            ->add('libelleCorpsMetier', TextType::class)
            ->add('idSecteur',ChoiceType::class,array('choices' => array ($secteurs )) )
            ->add('valider', SubmitType::class)
            ->add('annuler', ResetType::class)
            ->getForm();
        $form->handleRequest($request) ;
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager() ;
            $cm->setLibellecorpsmetier($form->get('libelleCorpsMetier')->getData());
            $cm->setIdsecteur($form->get('idSecteur')->getData());
            $em->persist($cm);
            $isSuccess = 1;
            try {
                $em->flush();
            } catch(Exception $e) {
                if (!empty($e)) {
                    $isSuccess = 0;
                }
            }            if ($isSuccess = 1) {
                $this->addFlash(
                    'success',
                    'Ajouté avec succès !'
                );
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue.'
                );
            }
        }
        return $this->render('@JmBatiInterim/Gestionnaire/ajouterCorpsMetier.html.twig',
                array('form'=>$form->createView()));
    }
    
    public function creerFormulaireCorpsMetierAction(Request $request) {
        $corpsMetier = new CorpsMetier();
        $form = $this->createForm(CorpsmetierType::class, $corpsMetier);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($corpsMetier);
            $em->flush();
            return $this->render('@JmBatiInterim/Gestionnaire/formCreerCorpsMetierConfirm.html.twig', array('data'=>$form->getData()));
        }
        return $this->render('@JmBatiInterim/Gestionnaire/formCreerCorpsMetier.html.twig', array('form'=>$form->createView()));
    }
}