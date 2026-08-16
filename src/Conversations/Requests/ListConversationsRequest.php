<?php

namespace Apologist\Conversations\Requests;

use Apologist\Core\Json\JsonSerializableType;

class ListConversationsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage Results per page (clamped to 100).
     */
    public ?int $perPage;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
