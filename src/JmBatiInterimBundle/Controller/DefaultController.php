<?php

namespace JmBatiInterimBundle\Controller;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use BatInterimBundle\Entity\Corpsmetier;
use BatInterimBundle\Entity\Artisan;
use BatInterimBundle\Entity\Entrepreneur;
use BatInterimBundle\Form\CorpsmetierType;


class DefaultController extends Controller
{
    public function accueilAction(Request $request)
    {
        $is = $this->get('security.token_storage')->getToken()->getRoles();
        if(!empty($is[0])) {
            if ($is[0]->getRole() === "ROLE_GESTIONNAIRE") {
                return $this->forward('JmBatiInterimBundle:Gestionnaire:index');
            } else if ($is[0]->getRole() === "isArtisan") {
                return $this->forward('JmBatiInterimBundle:Artisan:accueil');
            } else {
                return $this->forward('JmBatiInterimBundle:Entrepreneur:index');
            }
        }
        $form = $this->createFormBuilder()
                   ->add('login',TextType::class)
                   ->add('motDePasse',PasswordType::class)
                   ->add('Valider',SubmitType::class)
                   ->add('annuler',ResetType::class)
                   ->getForm();
        $request = Request::createFromGlobals();
        $form->handleRequest($request);
        
        if ($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            // on récupère les infos
            $login = $form->get('login')->getData();
            $mdp = $form->get('motDePasse')->getData();
            $isLogged = 0;
            
            // on verifie que ce n'est pas le gestionnaire qui se connecte
            if ($login === 'admin' && $mdp === 'azerty') {
                // créer la session
                $token = new UsernamePasswordToken($login, $mdp, 'main', array('ROLE_GESTIONNAIRE'));
                $this->get('security.token_storage')->setToken($token);
                $event = new InteractiveLoginEvent($request, $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                // pour récuprer son nom : $this->get('security.token_storage')->getToken()->getUser()
                return $this->forward('JmBatiInterimBundle:Gestionnaire:index');
            } else if ($login === 'admin' && $mdp !== 'azerty') {
                // retourner une erreur mdp
                $this->addFlash(
                    'danger',
                    'Mot de passe du gestionnaire incorrect. Veuillez réessayer.'
                );
                return $this->render('@JmBatiInterim/Default/index.html.twig',array('form'=>$form->createView()));
            }
            
            // si ce n'est pas le gestionnaire, on regarde dans les autres modules
            
            $artisanRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Artisan');
            $artisan = $artisanRepo->findBy(array('loginartisan' => $login));
            
            $entRepo = $this->getDoctrine()->getManager()->getRepository('JmBatiInterimBundle:Entrepreneur');
            $ent = $entRepo->findBy(array('loginentreprise' => $login));
            
            if (!empty($artisan[0]) || !empty($ent[0])) {
                if (!empty($artisan[0])) {
                    if (!$artisan[0]->getPremiereconnexion()) {
                        // c'est sa première connexion
                        $artisan[0]->setMdpartisan($mdp);
                        $artisan[0]->setPremiereconnexion(1);
                        $em->persist($artisan[0]);
                        $em->flush();
                        // renvoyer sur la page de connexion avec notif
                        $this->addFlash(
                        'danger',
                        'Votre compte a été crée avec succès ! Veuillez vous reconnecter.'
                    );
                    return $this->render('@JmBatiInterim/Default/index.html.twig',array('form'=>$form->createView()));

                    } else {
                        if ($login === $artisan[0]->getLoginartisan() && $mdp === $artisan[0]->getMdpartisan()) {
                            // connecter en tant que artisan
                            $token = new UsernamePasswordToken($login, $mdp, 'main', array('isArtisan'));
                            $this->get('security.token_storage')->setToken($token);
                            $event = new InteractiveLoginEvent($request, $token);
                            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                            // pour récuprer son nom : $this->get('security.token_storage')->getToken()->getUser()
                            return $this->forward('JmBatiInterimBundle:Gestionnaire:index');
                        }
                    }
                } else if (!empty($ent[0])) {
                    if (!$ent[0]->getPremiereconnexion()) {
                        // c'est sa première connexion
                        $ent[0]->setMdpentreprise($mdp);
                        $ent[0]->setPremiereconnexion(1);
                        $em->persist($ent[0]);
                        $em->flush();
                        // renvoyer sur la page de connexion avec notif
                    } else {
                        if ($login === $ent[0]->getLoginentreprise() && $mdp === $ent[0]->getMdpentreprise()) {
                            // connecter en tant qu'entreprise
                            $token = new UsernamePasswordToken($login, $mdp, 'main', array('isEntrepreneur'));
                            $this->get('security.token_storage')->setToken($token);
                            $event = new InteractiveLoginEvent($request, $token);
                            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                            // pour récuprer son nom : $this->get('security.token_storage')->getToken()->getUser()
                            return $this->forward('JmBatiInterimBundle:Gestionnaire:index');
                        }
                    }
                }
                    // retourner une erreur mdp
                    $this->addFlash(
                        'danger',
                        'Mot de passe du compte  incorrect. Veuillez réessayer.'
                    );
                    return $this->render('@JmBatiInterim/Default/index.html.twig',array('form'=>$form->createView()));
                } else {
                // retourner erreur login
                $this->addFlash(
                    'danger',
                    'Login introuvable.'
                );
            }
        }
        return $this->render('@JmBatiInterim/Default/index.html.twig',array('form'=>$form->createView(), 'isConnexion' => 1));
    }
    
    public function accueilGestionnaireAction()
    {
        //return $this->render('@BatInterim/Gestionnaire/indexGestionnaire.twig');
        return $this->forward('JmBatiInterimBundle:Gestionnaire:index') ;
    }
    
    public function accueilArtisanAction()
    {
        // return $this->render('@BatInterim/Artisan/accueilArtisan.twig');
        $vue = $this->renderView('@JmBatiInterim/Artisan/accueilArtisan.html.twig') ;
        return new Response($vue) ;
        
    }
    
        public function accueilEntrepreneurAction()
    {
        // return $this->render('@BatInterim/Entrepreneur/accueilEntrepreneur.twig');
        return $this->redirectToRoute('entrepreneur_accueil');
    }
    
    public function logoutAction(Request $request) {
        
        $session = $request->getSession();
        $session->clear();

        return $this->render('GestUserBundle:Security:logout.html.twig');
    }
}
