<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Entity\Comment;
use App\Entity\User;

class ArticleController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        $this->list();
                        break;
                    case 'read':
                        $this->read();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function list()
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->findAll();
        
        $this->render('article/list', [
            'articles' => $articles,
            'pageTitle' => 'Liste des articles'
        ]);
    }

    protected function read()
    {
        try {
            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                throw new \Exception("ID de l'article invalide");
            }

            $articleRepository = new ArticleRepository();
            $article = $articleRepository->findOneById((int)$_GET['id']);

            if (!$article) {
                throw new \Exception("Article non trouvé");
            }

            // Gestion de l'ajout de commentaire
            $error = '';
            if (isset($_POST['addComment']) && User::isLogged()) {
                if (empty($_POST['comment'])) {
                    $error = "Le commentaire ne peut pas être vide";
                } else {
                    $comment = new Comment();
                    $comment->setComment($_POST['comment'])
                           ->setUserId(User::getCurrentUserId())
                           ->setArticleId($article->getId());

                    $commentRepository = new CommentRepository();
                    if ($commentRepository->add($comment)) {
                        header('Location: index.php?controller=article&action=read&id=' . $article->getId());
                        exit;
                    } else {
                        $error = "Erreur lors de l'ajout du commentaire";
                    }
                }
            }

            // Récupération des commentaires
            $commentRepository = new CommentRepository();
            $comments = $commentRepository->findByArticleId($article->getId());

            $this->render('article/read', [
                'article' => $article,
                'comments' => $comments,
                'error' => $error,
                'pageTitle' => $article->getTitle()
            ]);
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
