<?php

namespace Apologist\Users\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Types\User;
use Apologist\Core\Json\JsonProperty;
use Apologist\Core\Types\ArrayType;

class ListUsersResponse extends JsonSerializableType
{
    /**
     * @var ?array<User> $data
     */
    #[JsonProperty('data'), ArrayType([User::class])]
    public ?array $data;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $perPage
     */
    #[JsonProperty('per_page')]
    public ?int $perPage;

    /**
     * @param array{
     *   data?: ?array<User>,
     *   total?: ?int,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->data = $values['data'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
