<?php 
namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use App\Form\ArticleType;

use Doctrine\ORM\EntityManagerInterface;
class TestController extends AbstractController
{
    #[Route('/article/save', name: 'adarticles')]
    public function save(EntityManagerInterface $entityManager) {
       // $entityManager = $this->getDoctrine()->getManager();
        $article = new Article();
        $article->setNom('Article 1');
        $article->setPrix(1000);
        
        $entityManager->persist($article);
        $entityManager->flush();
        return new Response('Article enregisté avec id '.$article->getId());
        }
        #[Route('/article/all', name: 'allArticles')]
        public function home(EntityManagerInterface $entityManager)
        {
        //récupérer tous les articles de la table article de la BD
        // et les mettre dans le tableau $articles
        
        $articles= $entityManager->getRepository(Article::class)->findAll();
        return $this->render('articles/index.html.twig',['articles'=> $articles]);
        }
        
        #[Route('/article/new', name: 'addArticle',methods: ['GET', 'POST'])]
        public function new(Request $request,EntityManagerInterface $entityManager) {
          

$article = new Article();
$form = $this->createForm(ArticleType::class,$article);
$form->handleRequest($request);
if($form->isSubmitted() && $form->isValid()) {
$article = $form->getData();

$entityManager->persist($article);
$entityManager->flush();
return $this->redirectToRoute('allArticles');
}
return $this->render('articles/new.html.twig',['form' => $form->createView()]);
            }
            
            #[Route('/article/{id}', name: 'article_show')]
            public function show($id,EntityManagerInterface $entityManager) {
                $article = $entityManager->getRepository(Article::class)
                ->find($id);
                return $this->render('articles/show.html.twig',
                array('article' => $article));
                }

                #[Route('/article/edit/{id}', name: 'article_edit')]
                public function edit(Request $request, $id,EntityManagerInterface $entityManager) {
                    $article = new Article();
                    $article = $entityManager->getRepository(Article::class)->find($id);
                    $form = $this->createForm(ArticleType::class,$article);
                    $form->handleRequest($request);
                    if($form->isSubmitted() && $form->isValid()) {
                   
                    $entityManager->flush();
                    return $this->redirectToRoute('allArticles');
                    }
                    return $this->render('articles/edit.html.twig', ['form' =>
                    $form->createView()]);
}

#[Route('/article/delete/{id}', name: 'article_delete')]
public function delete(Request $request, $id,EntityManagerInterface $entityManager) {
    $article = $entityManager->getRepository(Article::class)->find($id);
    
    $entityManager->remove($article);
    $entityManager->flush();
  //  $response = new Response();
 //   $response->send();
    return $this->redirectToRoute('allArticles');
    }
}

?>