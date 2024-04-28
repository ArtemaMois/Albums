<?php 

namespace App\Kernel\Http;

use App\Kernel\Validator\Validator;
use App\Kernel\Validator\ValidatorInterface;

interface RequestInterface
{
    public static function getFromGlobals(): self;

    public function uri();

    public function method();

    public function input(string $key, $default = null);

    public function setValidate(ValidatorInterface $validator);

    public function validate(array $rules): bool;

    public function errors(): array;

}