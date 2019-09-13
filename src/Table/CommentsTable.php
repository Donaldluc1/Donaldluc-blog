<?php
namespace App\Table;

use App\Model\Comments;

final class CommentsTable extends Table {

    protected $table = "comments";
    protected $class = Comments::class;


    public function createPost(Comments $Comments, int $id): void
    {
        $id = $this->create([
            'pseudo' => $Comments->getPseudo(),
            'mail' => $Comments->getMail(),
            'content' => $Comments->getContent(),
            'created_at' => $Comments->getCreatedAt()->format('Y-m-d H:i:s'),
            'post_id' => $id
        ]);
        $Comments->setID($id);
    }

    public function fetchComments($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE post_id = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(\PDO::FETCH_CLASS, $this->class);
        $result = $query->fetchAll();
        if ($result === false) {
            throw new NotFoundException($this->table, $id); 
        }
        return $result;
    }
    
}