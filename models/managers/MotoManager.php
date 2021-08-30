<?php
class MotoManager extends Database implements Crud{

	/**
	 *
	 * @return mixed
	 */
	function getAll() {
        $motoTab=[];
        try {
            $request=$this->bdd->prepare('SELECT * FROM motos');
            $request->execute();
            $motos=$request->fetchAll();
    
            foreach($motos as $moto) {
                $motoTab[]=new moto($moto['marque'], $moto['model'], $moto['type'], $moto['img'], $moto['description'], $moto['id']);
            }
        } catch (PDOException $e) {
            $this->setMessage('erreur BDD :'.$e->getMessage(),1);
        }
        return $motoTab;
	}
	
	/**
	 *
	 * @return mixed
	 */
	function getOne($id) {
        $theMoto=null;
        try {
            $request=$this->bdd->prepare('SELECT * FROM motos WHERE id= :id');
            $request->execute(['id' => $id]);
            $moto=$request->fetchAll();
    
            if (count($moto)>0){
                $theMoto=new moto($moto['marque'], $moto['model'], $moto['type'], $moto['img'], $moto['description'], $moto['id']);
            }
        } catch (PDOException $e) {
            $this->setMessage('erreur BDD :'.$e->getMessage(),1);
        }
        return $theMoto;
	}
	
	/**
	 *
	 * @return mixed
	 */
	function update(Moto $moto) {
        try {
            $request=$this->bdd->prepare('UPDATE motos SET  marque=:marque, model=:model,type=:type, img=:img, description=:description WHERE id= :id');
            $request->execute([' id' => $moto->getId(), 'marque'=>$moto->getMarque(), 'model' => $moto->getModel(),
                                'type' => $moto->getType(), 'img' => $moto->getImg(), 'description' => $moto->getDescription()]);
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
            $request=$this->bdd->prepare('DELETE FROM motos WHERE id=:id');
            $request->execute([':id' => $id]);
            $this->setMessage('Suppression  de la moto réussie', 0);
        } catch (PDOException $e) {
            $this->setMessage('Echec de la suppression: '.$e->getMessage(),1);
        }
	}
	
	/**
	 *
	 * @return mixed
	 */
	function insert(Moto $moto) {
        try {
            $request=$this->bdd->prepare('INSERT INTO motos (marque, model, type, img, description) VALUES (:marque, :model, :type, :img, :description)');
            $request->execute([
                'marque' => $moto->getMarque(),
                'model' => $moto->getModel(),
                'type'=>$moto->getType(),
                'img' => $moto->getImg(),
                'description' => $moto->getDescription()
            ]);
            $this->setMessage('Ajout  de la moto réussie', 0);
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