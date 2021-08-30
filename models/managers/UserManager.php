<?php
class UserManager extends Database implements Crud{

    public function __construct() {
        parent::__construct();
    }


    function getByName($name){
        $theUser=null;
        try {
            $request=$this->bdd->prepare('SELECT * FROM utilisateur WHERE username= :username');
            $request->execute(['username' => $name]);
            $user=$request->fetch();

            if ($user){
                $theUser=new user($user['username'], $user['password'], $user['id']);
            }
        } catch (PDOException $e) {
            $this->setMessage('erreur BDD :'.$e->getMessage(),1);
        }
        return $theUser;

    }

	/**
	 *
	 * @return mixed
	 */
	function getAll() {
        $userTab=[];
        try {
            $request=$this->bdd->prepare('SELECT * FROM utilisateur');
            $request->execute();
            $users=$request->fetchAll();
    
            foreach($users as $user) {
                $userTab[]=new user($user['username'], $user['password'], $user['id']);
            }
        } catch (PDOException $e) {
            $this->setMessage('erreur BDD :'.$e->getMessage(),1);
        }
        return $userTab;
	}
	
	/**
	 *
	 * @return mixed
	 */
	function getOne($id) {
        $theUser=null;
        try {
            $request=$this->bdd->prepare('SELECT * FROM utilisateur WHERE id= :id');
            $request->execute(['id' => $id]);
            $user=$request->fetch();
    
            if (count($user)>0){
                $theUser=new user($user['username'], $user['password'], $user['id']);
            }
        } catch (PDOException $e) {
            $this->setMessage('erreur BDD :'.$e->getMessage(),1);
        }
        return $theUser;
	}
	
	/**
	 *
	 * @return mixed
	 */
	function update($user) {
        try {
            $request=$this->bdd->prepare('UPDATE utilisateur SET username:username, password:password WHERE id= :id');
            $request->execute(['id' => $user->getId(), 'username' => $user->getUsername(), 'password'=>$user->getPassword()]);
            $this->setMessage('Modification réussie', 0);
        } catch (PDOException $e) {
            $this->setMessage('Echec de la modification : '.$e->getMessage(),1);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function delete($id) {
        try {
            $request=$this->bdd->prepare('DELETE FROM utilisateur WHERE id=:id');
            $request->execute([':id' => $id]);
            $this->setMessage('Suppression  de l\'utilisateur réussie', 0);
        } catch (PDOException $e) {
            $this->setMessage('Echec de la suppression: '.$e->getMessage(),1);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function insert($user) {
        try {
            $request=$this->bdd->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
            $request->execute([
                'username' => $user->getUsername(),
                'password' => $user->getPassword()
            ]);
            $this->setMessage('Ajout  de l\'utilisateur réussi', 0);
        } catch (PDOException $e) {
            $this->setMessage('Echec de l\'Ajout: '.$e->getMessage(),1);
        }
	}





    function setMessage($message, $error) {
        $_SESSION['message']['txt'] =$message;
        $_SESSION['message']['error']=$error;
    }
}


?>