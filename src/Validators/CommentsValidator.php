<?php
namespace App\Validators;


class CommentsValidator extends AbstractValidator {

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['pseudo', 'mail', 'content']);
        $this->validator->rule('lengthBetween', ['pseudo', 'content'], 3, 200);
        $this->validator->rule('email', 'mail');
    }
}