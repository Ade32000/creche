	<?php

	/*

		Connection to the database

	 */


	class ConnectDB
	{

	    private $bdd = '';
	    private $connec_host = '';
	    private $connec_dbname = '';
	    private $connec_pseudo = '';
	    private $connec_mdp = '';


	    public function __construct($connec_host,$connec_dbname,$connec_pseudo,$connec_mdp)
	    {


	    	$this->connec_host = $connec_host;
	    	$this->connec_dbname = $connec_dbname;
	    	$this->connec_pseudo = $connec_pseudo;
	    	$this->connec_mdp = $connec_mdp;


	        try 
	        {

	            $this->bdd = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
	            $this->bdd->exec("SET CHARACTER SET utf8");
	            $this->bdd->exec("SET NAMES utf8");

	        }
	        catch(PDOException $e) 
	        {

	            die('Erreur : ' . $e->getMessage());

	        }
	    }


	    public function connexion()
	    {

	        return $this->bdd;

	    }

	}

	
?>