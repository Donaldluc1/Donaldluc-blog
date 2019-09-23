<?php
namespace App\Validators;

use App\Table\SongTable;

class SongValidator extends AbstractValidator {

    public function __construct(array $data, SongTable $table, ?int $postID = null)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['name', 'slug', 'content']);
        $this->validator->rule('lengthBetween', ['name', 'slug'], 3, 200);
        $this->validator->rule(function($field, $value) use ($table, $postID){
            return !$table->exists($field, $value, $postID);
        }, ['name', 'slug'], 'Cette valeur est déjà utilisée');
    }
}