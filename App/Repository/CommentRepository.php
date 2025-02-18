<?php

namespace App\Repository;

use App\Entity\Comment;

class CommentRepository extends Repository
{
    public function findByArticleId(int $articleId): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comment WHERE article_id = :article_id");
        $query->bindParam(':article_id', $articleId, \PDO::PARAM_INT);
        $query->execute();
        
        $comments = $query->fetchAll($this->pdo::FETCH_ASSOC);
        
        $commentsObjects = [];
        foreach ($comments as $comment) {
            $commentsObjects[] = Comment::createAndHydrate($comment);
        }
        
        return $commentsObjects;
    }

    public function add(Comment $comment): bool
    {
        $query = $this->pdo->prepare('INSERT INTO comment (comment, user_id, article_id) VALUES (:comment, :user_id, :article_id)');
        
        $query->bindValue(':comment', $comment->getComment(), \PDO::PARAM_STR);
        $query->bindValue(':user_id', $comment->getUserId(), \PDO::PARAM_INT);
        $query->bindValue(':article_id', $comment->getArticleId(), \PDO::PARAM_INT);
        
        return $query->execute();
    }
} 