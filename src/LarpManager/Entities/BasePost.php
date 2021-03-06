<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-09 11:20:20.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Post
 *
 * @Entity()
 * @Table(name="post", indexes={@Index(name="fk_post_topic1_idx", columns={"topic_id"}), @Index(name="fk_post_user1_idx", columns={"user_id"}), @Index(name="fk_post_post1_idx", columns={"post_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePost", "extended":"Post"})
 */
class BasePost
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=450)
     */
    protected $title;

    /**
     * @Column(name="`text`", type="text")
     */
    protected $text;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $creation_date;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $update_date;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="post")
     * @JoinColumn(name="id", referencedColumnName="post_id", nullable=false)
     */
    protected $posts;

    /**
     * @OneToMany(targetEntity="PostView", mappedBy="post")
     * @JoinColumn(name="id", referencedColumnName="post_id", nullable=false)
     */
    protected $postViews;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="posts")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="postRelatedByUserIds")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $userRelatedByUserId;

    /**
     * @ManyToOne(targetEntity="Post", inversedBy="posts")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     */
    protected $post;

    /**
     * @ManyToMany(targetEntity="User", inversedBy="posts")
     * @JoinTable(name="watching_user",
     *     joinColumns={@JoinColumn(name="post_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="user_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $users;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->postViews = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Post
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
     * Set the value of title.
     *
     * @param string $title
     * @return \LarpManager\Entities\Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of text.
     *
     * @param string $text
     * @return \LarpManager\Entities\Post
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Post
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of creation_date.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of update_date.
     *
     * @param \DateTime $update_date
     * @return \LarpManager\Entities\Post
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get the value of update_date.
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Add Post entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\Post
     */
    public function addPost(Post $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove Post entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\Post
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);

        return $this;
    }

    /**
     * Get Post entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add PostView entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PostView $postView
     * @return \LarpManager\Entities\Post
     */
    public function addPostView(PostView $postView)
    {
        $this->postViews[] = $postView;

        return $this;
    }

    /**
     * Remove PostView entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PostView $postView
     * @return \LarpManager\Entities\Post
     */
    public function removePostView(PostView $postView)
    {
        $this->postViews->removeElement($postView);

        return $this;
    }

    /**
     * Get PostView entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostViews()
    {
        return $this->postViews;
    }

    /**
     * Set Topic entity (many to one).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Post
     */
    public function setTopic(Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get Topic entity (many to one).
     *
     * @return \LarpManager\Entities\Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set User entity related by `user_id` (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Post
     */
    public function setUserRelatedByUserId(User $user = null)
    {
        $this->userRelatedByUserId = $user;

        return $this;
    }

    /**
     * Get User entity related by `user_id` (many to one).
     *
     * @return \LarpManager\Entities\User
     */
    public function getUserRelatedByUserId()
    {
        return $this->userRelatedByUserId;
    }

    /**
     * Set Post entity (many to one).
     *
     * @param \LarpManager\Entities\Post $post
     * @return \LarpManager\Entities\Post
     */
    public function setPost(Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get Post entity (many to one).
     *
     * @return \LarpManager\Entities\Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Add User entity to collection.
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Post
     */
    public function addUser(User $user)
    {
        $user->addPost($this);
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove User entity from collection.
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Post
     */
    public function removeUser(User $user)
    {
        $user->removePost($this);
        $this->users->removeElement($user);

        return $this;
    }

    /**
     * Get User entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __sleep()
    {
        return array('id', 'title', 'text', 'creation_date', 'update_date', 'topic_id', 'user_id', 'post_id');
    }
}