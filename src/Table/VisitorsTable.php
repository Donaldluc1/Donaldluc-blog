<?php
namespace App\Table;

use App\Model\Visitors;

class VisitorsTable extends Table{

    protected $table = "visitors";
    protected $class = Visitors::class;

    public function createPost(Visitors $visitors): void
    {
        $id = $this->create([
            'username' => $visitors->getUsername(),
            'phone' => $visitors->getPhone(),
            'email' => $visitors->getEmail(),
            'created_at' => $visitors->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        $visitors->setID($id);
    }
}