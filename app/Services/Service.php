<?php
declare(strict_types=1);

namespace App\Services;

abstract class Service
{
    protected ServiceResponse $response;

    protected array $serviceErrors = [];

    final protected function addError(ServiceError $error): self
    {
        $this->serviceErrors[] = $error;

        return $this;
    }

    final protected function createResponse(mixed $result = null, ?ServiceError ...$errors): ServiceResponse
    {
        return new ServiceResponse($result, [...$this->serviceErrors, ...$errors]);
    }

    final protected function createServiceErrorResponse(string $message = '', int $code = 99999, mixed $result = null): ServiceResponse
    {
        $this->addError(new ServiceError($message, $code));
        return $this->createResponse($result);
    }
}
