<?php
class User{
    private $id;
    private $username;
    private $password;

    public function __construct($username, $password, $id =null){
        $this->username = $username;
        $this->password = $password;
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
	 * @return User
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getUsername() {
		return $this->username;
	}
	
	/**
	 * 
	 * @param mixed $username 
	 * @return User
	 */
	function setUsername($username): self {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	function getPassword() {
		return $this->password;
	}
	
	/**
	 * 
	 * @param mixed $password 
	 * @return User
	 */
	function setPassword($password): self {
		$this->password = $password;
		return $this;
	}
}

?>