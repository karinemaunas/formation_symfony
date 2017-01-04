<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ArticleController extends Controller
{
    /**
     * @Route("/blog/add", name="add_article")
     */
    public function addAction(Request $request)
    {
        $article = new article();

        //on crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$article);

        //on ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
                ->add('titre',  TextType::class)
                ->add('auteur', TextType::class)
                ->add('description',    TextType::class)
                ->add('contenu',    TextareaType::class)
                ->add('save',   SubmitType::class)
        ;

        //À partir de formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

      if ($request->isMethod('POST')) {
            
            //On fait le lien requête<->formulaire
            //À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur
            $form->handleRequest($request);
            
            // On vérifie que les valeurs entrées sont correctes
            // (Nous verrons la validation des objets en détail dans le prochain chapitre)
            if ($form->isValid()) {
                //on enregistre notre objet $advert dans la bdd
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré');
                //on redirige la page de visualisation de l'annonce nouvellement créée
               // return $this->redirectToRoute('blog_edit', array('id'=>$article->getId())};
            }
      }


        return $this->render('blog/add.html.twig',
            [
                'article'=>$article,
                'form' => $form->createView(),


            ]);

    }

}
