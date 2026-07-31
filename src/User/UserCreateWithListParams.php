<?php

declare(strict_types=1);

namespace Apologist\User;

use Apologist\Core\Attributes\Optional;
use Apologist\Core\Concerns\SdkModel;
use Apologist\Core\Concerns\SdkParams;
use Apologist\Core\Contracts\BaseModel;

/**
 * Creates list of users with given input array.
 *
 * @see Apologist\Services\UserService::createWithList()
 *
 * @phpstan-import-type UserShape from \Apologist\User\User
 *
 * @phpstan-type UserCreateWithListParamsShape = array{
 *   body?: list<User|UserShape>|null
 * }
 */
final class UserCreateWithListParams implements BaseModel
{
    /** @use SdkModel<UserCreateWithListParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<User>|null $body */
    #[Optional(list: User::class)]
    public ?array $body;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<User|UserShape>|null $body
     */
    public static function with(?array $body = null): self
    {
        $self = new self;

        null !== $body && $self['body'] = $body;

        return $self;
    }

    /**
     * @param list<User|UserShape> $body
     */
    public function withBody(array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
