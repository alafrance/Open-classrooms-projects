<?php
namespace App\src\DAO;
use App\src\model\Comment;
use App\config\Parameter;
class CommentDAO extends DAO{
    private function buildObject($row){
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDate($row['date']);
        $comment->setFlag($row['flag']);
        return $comment;
    }
    public function getCommentsFromArticle($articleId){
        $sql = "SELECT id, pseudo, content, date, flag FROM comment WHERE article_id = ? ORDER BY date DESC";
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
        $sql = "SELECT id, pseudo, content, date, flag FROM comment WHERE flag = ? ORDER BY date DESC";
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
    
    public function addComment(Parameter $post, $articleId, $pseudo){
        $sql = 'INSERT INTO comment(pseudo, content, date, flag, article_id) VALUES(?,?,NOW(), ?, ?)';
        $this->createQuery($sql, [$pseudo, $post->get('content'), 0,  $articleId]);
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

