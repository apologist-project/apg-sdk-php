<?php

namespace Apologist\Channels\Types;

use Apologist\Core\Json\JsonSerializableType;
use Apologist\Core\Json\JsonProperty;

class GetDiscordChannelStatusResponse extends JsonSerializableType
{
    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $channel
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?bool $active
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @param array{
     *   status?: ?string,
     *   channel?: ?string,
     *   active?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->active = $values['active'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
