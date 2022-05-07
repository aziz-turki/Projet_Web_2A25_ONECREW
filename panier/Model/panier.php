<?php
class panier_line
{
	protected $id;
	protected $id_panier;
	protected $id_utilisateur;
	protected $prix;
	protected $nbr;
	protected $nom_produit;


	public function __construct($id_panier,$id_utilisateur,$prix,$nbr,$nom_produit)
	{
		$this->id_panier = $id_panier;
		$this->id_utilisateur = $id_utilisateur;
		$this->prix = $prix;
		$this->nbr = $nbr;
		$this->nom_produit = $nom_produit;
	}	

	/**
	 * Get the value of nom_produit
	 */ 
	public function getNom_produit()
	{
		return $this->nom_produit;
	}

	/**
	 * Set the value of nom_produit
	 *
	 * @return  self
	 */ 
	public function setNom_produit($nom_produit)
	{
		$this->nom_produit = $nom_produit;

		return $this;
	}

	/**
	 * Get the value of nbr
	 */ 
	public function getNbr()
	{
		return $this->nbr;
	}

	/**
	 * Set the value of nbr
	 *
	 * @return  self
	 */ 
	public function setNbr($nbr)
	{
		$this->nbr = $nbr;

		return $this;
	}

	/**
	 * Get the value of prix
	 */ 
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * Set the value of prix
	 *
	 * @return  self
	 */ 
	public function setPrix($prix)
	{
		$this->prix = $prix;

		return $this;
	}

	/**
	 * Get the value of id_utilisateur
	 */ 
	public function getId_utilisateur()
	{
		return $this->id_utilisateur;
	}

	/**
	 * Set the value of id_utilisateur
	 *
	 * @return  self
	 */ 
	public function setId_utilisateur($id_utilisateur)
	{
		$this->id_utilisateur = $id_utilisateur;

		return $this;
	}

	/**
	 * Get the value of id_panier
	 */ 
	public function getId_panier()
	{
		return $this->id_panier;
	}

	/**
	 * Set the value of id_panier
	 *
	 * @return  self
	 */ 
	public function setId_panier($id_panier)
	{
		$this->id_panier = $id_panier;

		return $this;
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}
}

?>