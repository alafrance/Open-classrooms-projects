<?php
namespace App\src\DAO;
use App\src\model\Article;
use App\config\Parameter;
class ArticleDAO extends DAO{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setDate($row['date']);
        $article->setAuthor($row['author']);
        $article->setNumberChapter($row['numberChapter']);
        $article->setImage($row['image']);
        return $article;
    }
    public function getArticles(){
        $sql = 'SELECT * FROM article ORDER BY numberChapter';
        $request = $this->createQuery($sql);
        $articles = [];
        foreach ($request as $row){
            $id = $row['id'];
            $articles[$id] = $this->buildObject($row);
        }
        $request->closeCursor();
        return $articles;
        }
    public function getArticle($id){
        $sql = 'SELECT * FROM article WHERE id = ?';
        $request = $this->createQuery($sql, [$id]);
        $article = $request->fetch();
        $request->closeCursor();
        return  $this->buildObject($article);
    }
    public function addArticle(Parameter $post, $image)
    {
        $sql = 'INSERT INTO article (title, content, numberChapter, date, image) VALUES (?, ?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('title'), $post->get('content'), $post->get('numberChapter'), $image]);
    }

    public function editArticle(Parameter $post, $articleId)
    {
        $sql = 'UPDATE article SET title=:title, content=:content WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'articleId' => $articleId
        ]);
    }
      public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';
        $this->createQuery($sql, [$articleId]);
        $sql = 'DELETE FROM article WHERE id = ?';
        $this->createQuery($sql, [$articleId]);
    }
    public function checkNumberChapter(Parameter $post){
        $sql = 'SELECT COUNT(numberChapter) FROM article WHERE numberChapter = ?';
        $request = $this->createQuery($sql, [$post->get('numberChapter')]);
        $isUnique = $request->fetchColumn();
        if ($isUnique){
            return '<p>Le chapitre existe déja</p>';
        }
    }

}
