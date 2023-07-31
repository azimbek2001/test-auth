<?php
declare(strict_types=1);

namespace App\Services;

class ServiceResponse
{
    /**
     * @var array
     */
    protected array $serviceErrors = [];
    /**
     * @var mixed
     */
    protected mixed $result;

    /**
     * @param mixed $result
     * @param array $serviceErrors
     */
    public function __construct(mixed $result, array $serviceErrors = [])
    {
        $this->result = $result;
        $this->serviceErrors = $serviceErrors;
    }

    /**
     * @return array
     */
    public function getServiceErrors(): array
    {
        return $this->serviceErrors;
    }

    /**
     * @return mixed
     */
    public function getResult(): mixed
    {
        return $this->result;
    }

    /**
     * @param int $errorCode
     * @return bool
     */
    public function hasServerError(int $errorCode): bool
    {
        foreach ($this->serviceErrors as $error) {
            if ($error->getCode() == $errorCode) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->hasNotServerErrors();
    }

    /**
     * @return bool
     */
    public function hasNotServerErrors(): bool
    {
        return !$this->hasServerErrors();
    }

    /**
     * @return bool
     */
    public function hasServerErrors(): bool
    {
        return count($this->serviceErrors) > 0;
    }

    /**
     * @return bool
     */
    public function isFailed(): bool
    {
        return $this->hasServerErrors();
    }

    /**
     * @return ServiceError|null
     */
    public function getServiceError(): ?ServiceError
    {
        return $this->hasServerErrors() ? $this->getServiceErrors()[0] : null;
    }
}
