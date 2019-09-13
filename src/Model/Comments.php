<?php
namespace App\Model;

use App\Helpers\Text;
use \DateTime;

class Comments{

    /**
     * @var int
     */
    private $id;

    private $pseudo;

    private $mail;

    private $content;

    private $post_id;

    private $created_at;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    
    public function getContent(): ?string
    {
        return $this->content;
    }

     
    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getFormattedContent(): ?string
    {
        return nl2br(e($this->content));
    }

    
    public function getPost_id(): ?int
    {
        return $this->post_id;
    }


    public function setPostId(int $post_id)
    {
        $this->post_id = $post_id;

        return $this;
    }

    
    public function getCreatedAt(): ?DateTime
    {
        return new DateTime ($this->created_at);
    }


    public function setCreatedAt(string $date): self
    {
        $this->created_at = $date;
        return $this;
    }
}