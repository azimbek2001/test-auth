<?php
declare(strict_types=1);

namespace App\Http\Dto;

use Illuminate\Http\Request;
use ReflectionClass;

abstract class BaseDto
{
    /**
     * @var Request|null
     */
    public Request|null $request = null;

    /**
     * @param array|object $attributes
     */
    public final function __construct(array|object $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $this->castValue($value, $key);
            }
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $properties = get_object_vars($this);
        $data = [];

        foreach ($properties as $key => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $data[$key] = $value->toArray();
            } else {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * @param array $data
     * @return self
     */
    public final static function fromArray(array $data): self
    {
        return new static($data);
    }

    /**
     * @param mixed $value
     * @param $key
     * @return mixed
     * @throws \ReflectionException
     */
    private function castValue(mixed $value, $key): mixed
    {
        $class = static::class;
        $reflector = new ReflectionClass($class);
        $property = $reflector->getProperty($key);
        $type = $property->getType();

        return match ($type->getName()) {
            'int' => (int)$value,
            'bool' => (bool)$value,
            'string' => (string)$value,
            default => $value,
        };
    }

    /**
     * @param Request $request
     * @param array $parameters
     * @return static
     */
    public final static function fromRequest(Request $request, array $parameters = []): static
    {
        $instance = new static([...$request->all(), ...$parameters]);
        $instance->request = $request;
        return $instance;
    }
}
