<?php
declare(strict_types=1);

namespace App\Exceptions\Repository;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ModelNotFoundException extends NotFoundHttpException
{
    public function __construct(string $message = 'Model not found', Throwable $previous = null, int $code = 0, array $headers = [])
    {
        parent::__construct($message, $previous, $code, $headers);
    }
}
