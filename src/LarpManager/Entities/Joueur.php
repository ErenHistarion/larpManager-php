<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-25 10:02:42.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseJoueur;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Joueur
 *
 * @Entity()
 */
class Joueur extends BaseJoueur
{
	public function __construct()
	{
		parent::__construct();
		$this->setCreationDate(new \Datetime('NOW'));
		$this->setUpdateDate(new \Datetime('NOW'));
	}
	
	public function __toString() {
		return $this->getNom();
	}
	/**
	 * Fourni la liste des gns auquel un joueur est inscrit
	 * 
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getGns()
	{
		$gn = new ArrayCollection();
		
		foreach ( $this->getJoueurGns() as $joueurGn )
		{
			$gn[] = $joueurGn->getGn();
		}
		return $gn;
	}
}