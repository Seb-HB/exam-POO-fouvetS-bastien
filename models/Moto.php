<?php
class Moto{
    private $id;
    private $marque;
    private $model;
    private $type;
    private $img;
    private $description;

    public function __construct($marque, $model, $type, $description, $img =null,$id=null){
        $this->marque = $marque;
        $this->model = $model;
        $this->type = $type;
        $this->img = $img;
        $this->description = $description;
        $this->id = $id;
    }

	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return Moto
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getMarque() {
		return $this->marque;
	}
	
	/**
	 * 
	 * @param mixed $marque 
	 * @return Moto
	 */
	function setMarque($marque): self {
		$this->marque = $marque;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getModel() {
		return $this->model;
	}
	
	/**
	 * 
	 * @param mixed $model 
	 * @return Moto
	 */
	function setModel($model): self {
		$this->model = $model;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getType() {
		return $this->type;
	}
	
	/**
	 * 
	 * @param mixed $type 
	 * @return Moto
	 */
	function setType($type): self {
		$this->type = $type;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getImg() {
		return $this->img;
	}
	
	/**
	 * 
	 * @param mixed $img 
	 * @return Moto
	 */
	function setImg($img): self {
		$this->img = $img;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getDescription() {
		return $this->description;
	}
	
	/**
	 * 
	 * @param mixed $decription 
	 * @return Moto
	 */
	function setDescription($description): self {
		$this->description = $description;
		return $this;
	}
}

?>