<?php

namespace ApologistAi\Users\Requests;

use ApologistAi\Core\Json\JsonSerializableType;

class ListUsersRequest extends JsonSerializableType
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
     * @var ?string $externalId
     */
    public ?string $externalId;

    /**
     * @var ?string $tags Comma-separated tag ids.
     */
    public ?string $tags;

    /**
     * @var ?string $responderId
     */
    public ?string $responderId;

    /**
     * @var ?string $minTimestamp
     */
    public ?string $minTimestamp;

    /**
     * @var ?string $maxTimestamp
     */
    public ?string $maxTimestamp;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   externalId?: ?string,
     *   tags?: ?string,
     *   responderId?: ?string,
     *   minTimestamp?: ?string,
     *   maxTimestamp?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->responderId = $values['responderId'] ?? null;
        $this->minTimestamp = $values['minTimestamp'] ?? null;
        $this->maxTimestamp = $values['maxTimestamp'] ?? null;
    }
}
