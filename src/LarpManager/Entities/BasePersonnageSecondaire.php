<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-09 11:20:19.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\PersonnageSecondaire
 *
 * @Entity()
 * @Table(name="personnage_secondaire", indexes={@Index(name="fk_personnage_secondaire_classe1_idx", columns={"classe_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnageSecondaire", "extended":"PersonnageSecondaire"})
 */
class BasePersonnageSecondaire
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @OneToMany(targetEntity="Participant", mappedBy="personnageSecondaire")
     * @JoinColumn(name="id", referencedColumnName="personnage_secondaire_id", nullable=false)
     */
    protected $participants;

    /**
     * @OneToMany(targetEntity="PersonnageSecondaireCompetence", mappedBy="personnageSecondaire", cascade={"persist"})
     * @JoinColumn(name="id", referencedColumnName="personnage_secondaire_id", nullable=false)
     */
    protected $personnageSecondaireCompetences;

    /**
     * @OneToMany(targetEntity="User", mappedBy="personnageSecondaire", cascade={"persist", "remove"})
     * @JoinColumn(name="id", referencedColumnName="personnage_secondaire_id", nullable=false)
     */
    protected $users;

    /**
     * @ManyToOne(targetEntity="Classe", inversedBy="personnageSecondaires")
     * @JoinColumn(name="classe_id", referencedColumnName="id", nullable=false)
     */
    protected $classe;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->personnageSecondaireCompetences = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\PersonnageSecondaire
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
     * Add Participant entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function addParticipant(Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove Participant entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function removeParticipant(Participant $participant)
    {
        $this->participants->removeElement($participant);

        return $this;
    }

    /**
     * Get Participant entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Add PersonnageSecondaireCompetence entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaireCompetence $personnageSecondaireCompetence
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function addPersonnageSecondaireCompetence(PersonnageSecondaireCompetence $personnageSecondaireCompetence)
    {
        $this->personnageSecondaireCompetences[] = $personnageSecondaireCompetence;

        return $this;
    }

    /**
     * Remove PersonnageSecondaireCompetence entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaireCompetence $personnageSecondaireCompetence
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function removePersonnageSecondaireCompetence(PersonnageSecondaireCompetence $personnageSecondaireCompetence)
    {
        $this->personnageSecondaireCompetences->removeElement($personnageSecondaireCompetence);

        return $this;
    }

    /**
     * Get PersonnageSecondaireCompetence entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageSecondaireCompetences()
    {
        return $this->personnageSecondaireCompetences;
    }

    /**
     * Add User entity to collection (one to many).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove User entity from collection (one to many).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);

        return $this;
    }

    /**
     * Get User entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set Classe entity (many to one).
     *
     * @param \LarpManager\Entities\Classe $classe
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function setClasse(Classe $classe = null)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get Classe entity (many to one).
     *
     * @return \LarpManager\Entities\Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

    public function __sleep()
    {
        return array('id', 'classe_id');
    }
}