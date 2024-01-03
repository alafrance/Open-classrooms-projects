<?php
namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;
class UserDAO extends DAO{
    private function buildObject($row){
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setDateCreation($row['dateCreation']);
        $user->setRole($row['name']);
        return $user;
    }
    public function getUsers(){
       $sql = 'SELECT user.id, user.pseudo, user.dateCreation, role.name FROM user INNER JOIN role ON user.role_id = role.id ORDER BY user.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }
    public function register(Parameter $post){
        $sql = 'INSERT INTO user (pseudo, password, dateCreation, role_id, email) VALUES(?, ?, NOW(), ?, ?) ';
        $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_DEFAULT), 2, $post->get('email')]);
    }
    public function checkUser(Parameter $post){
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo= ? ';
        $request = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $request->fetchColumn();
        if ($isUnique){
            return '<p class="center alert alert-warning">Le pseudo existe déja</p>';
        }
    }
    public function login(Parameter $post){
        $sql = 'SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo= ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $request = $data->fetch();
        if ($request){
            $isPasswordValid = password_verify($post->get('password'), $request['password']);
            return [
                'result' => $request,
                'isPasswordValid' => $isPasswordValid
            ];  
        }else{
            return [
                'result' => $request,
                'isPasswordValid' => false
            ];
        }
    }
    public function isPasswordValid($pseudo, $password){
        $sql = 'SELECT password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$pseudo]);
        $request = $data->fetch();
        $isPasswordValid = password_verify($password, $request['password']);
        return $isPasswordValid;
    }
    public function loginAuto($pseudo, $password){
        $sql = 'SELECT user.id, user.role_id, user.password, role.name FROM user INNER JOIN role ON role.id = user.role_id WHERE pseudo= ?';
        $data = $this->createQuery($sql, [$pseudo]);
        $request = $data->fetch();
        if ($request['password'] == $password){
            return [
            'result' => $request,
            'isPasswordValid' => true
            ]; 
        }else{
            return [
                'result' => $request,
                'isPasswordValid' => false
            ];
        }
        
    }
    
    public function updatePassword(Parameter $post, $pseudo){
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_DEFAULT), $pseudo]);
    }
    public function deleteAccount($pseudo){
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
   }
   public function deleteUser($userId){
       $sql = 'DELETE FROM user WHERE id = ?';
       $this->createQuery($sql, [$userId]);
   }
}
