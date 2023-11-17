<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryNotFoundException extends NotFoundHttpException
{
    public function __construct(string $message = 'Category not found')
    {
        parent::__construct($message);
    }
}