<?php

namespace ApologistAi\Types;

use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Types\ArrayType;

class Error extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var array<string> $errors
     */
    #[JsonProperty('errors'), ArrayType(['string'])]
    public array $errors;

    /**
     * @param array{
     *   success: bool,
     *   errors: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->errors = $values['errors'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
