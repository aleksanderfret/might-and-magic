<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Model\CommentInterface as UserCommentInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="`comment`",
 *      indexes={
 *          @ORM\Index(
 *              name="idx_comment_author_id",
 *              columns={"author_id"}),
 *          @ORM\Index(
 *              name="idx_comment_game_id",
 *              columns={"game_id"}),
 *          @ORM\Index(
 *              name="idx_comment_parentComment_id",
 *              columns={"parentComment_id"}
 *          )
 *      }
 * )
 */
class Comment implements UserCommentInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`comment`", type="text")
     * @Assert\NotBlank(message="comment.blank")
     * @Assert\Length(
     *     min=5,
     *     minMessage="comment.too_short",
     *     max=10000,
     *     maxMessage="comment.too_long"
     * )
     */
    protected $comment;
    
    /**
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="answer")
     * @ORM\JoinColumn(name="parentComment_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     */
    protected $parentComment;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $addDate;
        
    /**
     * @ORM\ManyToOne(targetEntity="GameBundle\Model\UserInterface", inversedBy="comment")
     * @ORM\JoinColumn(name="author_id", nullable=false, referencedColumnName="id")
     */
    protected $author;
    
    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="comment")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $game;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="parentComment")
     */
    protected $answer;
    
    
    public function __construct()
    {
        $this->answer = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Comment
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set user
     *
     * @param \GameBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setAuthor(\UserBundle\Entity\User $user = null)
    {
        $this->author = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GameBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->user;
    }

    /**
     * Set game
     *
     * @param \GameBundle\Entity\Game $game
     *
     * @return Comment
     */
    public function setGame(\GameBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \GameBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set answer
     *
     * @param \GameBundle\Entity\Comment $answer
     *
     * @return Comment
     */
    public function setAnswer(\GameBundle\Entity\Comment $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \GameBundle\Entity\Comment
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Add parentComment
     *
     * @param \GameBundle\Entity\Comment $parentComment
     *
     * @return Comment
     */
    public function addParentComment(\GameBundle\Entity\Comment $parentComment)
    {
        $this->parentComment[] = $parentComment;

        return $this;
    }

    /**
     * Remove parentComment
     *
     * @param \GameBundle\Entity\Comment $parentComment
     */
    public function removeParentComment(\GameBundle\Entity\Comment $parentComment)
    {
        $this->parentComment->removeElement($parentComment);
    }

    /**
     * Get parentComment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParentComment()
    {
        return $this->parentComment;
    }

    /**
     * Set parentComment
     *
     * @param \GameBundle\Entity\Comment $parentComment
     *
     * @return Comment
     */
    public function setParentComment(\GameBundle\Entity\Comment $parentComment = null)
    {
        $this->parentComment = $parentComment;

        return $this;
    }

    /**
     * Add answer
     *
     * @param \GameBundle\Entity\Comment $answer
     *
     * @return Comment
     */
    public function addAnswer(\GameBundle\Entity\Comment $answer)
    {
        $this->answer[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \GameBundle\Entity\Comment $answer
     */
    public function removeAnswer(\GameBundle\Entity\Comment $answer)
    {
        $this->answer->removeElement($answer);
    }
}