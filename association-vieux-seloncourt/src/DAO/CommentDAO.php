<?php
namespace App\src\DAO;

use App\src\config\Parameter;
use App\src\model\Comment;

class CommentDAO extends DAO{
    public function buildObject($row){
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setName($row['name']);
        $comment->setContent($row['content']);
        $comment->setDate($row['date']);
        $comment->setFlag($row['flag']);
        return $comment;
    }
    public function getCommentsFromArticle($articleId){
        $sql = "SELECT id, name, content, DATE_FORMAT(date, '%d/%m/%Y') AS date, flag FROM comment WHERE article_id = ? ORDER BY date DESC";
        $request = $this->createQuery($sql, [$articleId]);
        $comments = [];
        foreach ($request as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $request->closeCursor();
        return $comments;
    }
    public function getFlagComments(){
        $sql = "SELECT id, name, content, date, flag FROM comment WHERE flag = ? ORDER BY date DESC";
        $result = $this->createQuery($sql, [1]);
        $comments = [];
        foreach ($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
    public function unFlagComment($commentId){
        $sql = "UPDATE comment SET flag = ? WHERE id = ?";
        $this->createQuery($sql, [0, $commentId]);
    }

    public function addComment($post, $articleId, $name){
        $sql = 'INSERT INTO comment(name, content, date, flag, article_id) VALUES(?,?,NOW(), ?, ?)';
        $this->createQuery($sql, [$name, htmlspecialchars($post->get('content')), 0,  $articleId]);
    }
    public function deleteComment($commentId){
        $sql = 'DELETE FROM comment WHERE id= ?';
        $this->createQuery($sql, [$commentId]);
    }

   public function flagComment($commentId){
        $sql = 'UPDATE comment SET flag = ? WHERE id= ?';
        $this->createQuery($sql, [1, $commentId]);
    }
}
