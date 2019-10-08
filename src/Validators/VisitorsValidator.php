<?php
namespace App\Validators;

class VisitorsValidator extends AbstractValidator {

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->validator->rule('required', ['username', 'phone', 'email']);
        $this->validator->rule('lengthBetween', ['username', 'phone'], 3, 200);
        $this->validator->rule('email', 'mail');
    }
}