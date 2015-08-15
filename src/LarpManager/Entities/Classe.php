<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-15 15:56:46.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use LarpManager\Entities\BaseClasse;

/**
 * Je définie les relations ManyToMany içi au lieu de le faire dans Mysql Workbench
 * car l'exporteur ne sait pas gérer correctement plusieurs relations ManyToMany entre 
 * les mêmes entities (c'est dommage ...)
 * 
 * LarpManager\Entities\Classe
 *
 * @Entity()
 */
class Classe extends BaseClasse
{
	/**
	 * @ManyToMany(targetEntity="Competence", inversedBy="classeFavorites")
	 * @JoinTable(name="classe_competence_favorite",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceFavorites;
	
	/**
	 * @ManyToMany(targetEntity="Competence", inversedBy="classeNormales")
	 * @JoinTable(name="classe_competence_normale",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceNormales;
	
	/**
	 * @ManyToMany(targetEntity="Competence", inversedBy="classeCreations")
	 * @JoinTable(name="classe_competence_creation",
	 *     joinColumns={@JoinColumn(name="classe_id", referencedColumnName="id")},
	 *     inverseJoinColumns={@JoinColumn(name="competence_id", referencedColumnName="id")}
	 * )
	 */
	protected $competenceCreations;
	
	public function __construct()
	{
		$this->competenceFavorites = new ArrayCollection();
		$this->competenceNormales = new ArrayCollection();
		$this->competenceCreations = new ArrayCollection();
		parent::__construct();
	}
	
	public function getLabel()
	{
		return $this->getLabelFeminin().' / '.$this->getLabelMasculin();
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceFavorite(Competence $competence)
	{
		$competence->addClasseFavorite($this);
		$this->competenceFavorites[] = $competence;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceFavorite(Competence $competence)
	{
		$competence->removeClasseFavorite($this);
		$this->$competenceFavorites->removeElement($competence);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceFavorites()
	{
		return $this->competenceFavorites;
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceNormale(Competence $competence)
	{
		$competence->addClasseNormale($this);
		$this->competenceNormales[] = $competence;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceNormale(Competence $competence)
	{
		$competence->removeClasseNormale($this);
		$this->$competenceNormales->removeElement($competence);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceNormales()
	{
		return $this->competenceNormales;
	}
	
	/**
	 * Add Competence entity to collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function addCompetenceCreation(Competence $competence)
	{
		$competence->addClasseCreation($this);
		$this->competenceCreations[] = $competence;
	
		return $this;
	}
	
	/**
	 * Remove Competence entity from collection.
	 *
	 * @param \LarpManager\Entities\Competence $competence
	 * @return \LarpManager\Entities\Classe
	 */
	public function removeCompetenceCreation(Competence $competence)
	{
		$competence->removeClasseCreation($this);
		$this->$competenceCreations->removeElement($competence);
	
		return $this;
	}
	
	/**
	 * Get Competence entity collection.
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCompetenceCreations()
	{
		return $this->competenceCreations;
	}
}