<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-01 07:10:35.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Ressource
 *
 * @Entity()
 * @Table(name="ressource")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseRessource", "extended":"Ressource"})
 */
class BaseRessource
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=100)
     */
    protected $nom;

    /**
     * @Column(type="integer")
     */
    protected $rarete;

    /**
     * @ManyToMany(targetEntity="Pays", inversedBy="ressources")
     * @JoinTable(name="pays_importation",
     *     joinColumns={@JoinColumn(name="ressource_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="pays_id", referencedColumnName="id")}
     * )
     */
    protected $paysImportateur;
    
    /**
     * @ManyToMany(targetEntity="Pays", inversedBy="ressources")
     * @JoinTable(name="pays_exportation",
     *     joinColumns={@JoinColumn(name="ressource_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="pays_id", referencedColumnName="id")}
     * )
     */
    protected $paysExportateur;

    public function __construct()
    {
        $this->paysImportateur = new ArrayCollection();
        $this->paysExportateur = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Ressource
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of nom.
     *
     * @param string $nom
     * @return \LarpManager\Entities\Ressource
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of rarete.
     *
     * @param integer $rarete
     * @return \LarpManager\Entities\Ressource
     */
    public function setRarete($rarete)
    {
        $this->rarete = $rarete;

        return $this;
    }

    /**
     * Get the value of rarete.
     *
     * @return integer
     */
    public function getRarete()
    {
        return $this->rarete;
    }

    /**
     * Add Pays entity to collection.
     *
     * @param \LarpManager\Entities\Pays $pays
     * @return \LarpManager\Entities\Ressource
     */
    public function addPaysImportateur(Pays $pays)
    {
        $pays->addRessourceImporte($this);
        $this->paysImportateur[] = $pays;

        return $this;
    }

    /**
     * Remove Pays entity from collection.
     *
     * @param \LarpManager\Entities\Pays $pays
     * @return \LarpManager\Entities\Ressource
     */
    public function removePaysImportateur(Pays $pays)
    {
        $pays->removeRessourceImporte($this);
        $this->paysImportateur->removeElement($pays);

        return $this;
    }

    /**
     * Get Pays entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaysImportateur()
    {
        return $this->paysImportateur;
    }
    
    /**
     * Add Pays entity to collection.
     *
     * @param \LarpManager\Entities\Pays $pays
     * @return \LarpManager\Entities\Ressource
     */
    public function addPaysExportateur(Pays $pays)
    {
    	$pays->addRessourceExporte($this);
    	$this->paysExportateur[] = $pays;
    
    	return $this;
    }
    
    /**
     * Remove Pays entity from collection.
     *
     * @param \LarpManager\Entities\Pays $pays
     * @return \LarpManager\Entities\Ressource
     */
    public function removePaysExportateur(Pays $pays)
    {
    	$pays->removeRessourceExporte($this);
    	$this->paysExportateur>removeElement($pays);
    
    	return $this;
    }
    
    /**
     * Get Pays entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaysExportateur()
    {
    	return $this->paysExportateur;
    }

    public function __sleep()
    {
        return array('id', 'nom', 'rarete');
    }
}