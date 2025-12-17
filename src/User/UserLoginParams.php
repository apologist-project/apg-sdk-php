<?php

declare(strict_types=1);

namespace Apologist\User;

use Apologist\Core\Attributes\Optional;
use Apologist\Core\Concerns\SdkModel;
use Apologist\Core\Concerns\SdkParams;
use Apologist\Core\Contracts\BaseModel;

/**
 * Logs user into the system.
 *
 * @see Apologist\Services\UserService::login()
 *
 * @phpstan-type UserLoginParamsShape = array{
 *   password?: string|null, username?: string|null
 * }
 */
final class UserLoginParams implements BaseModel
{
    /** @use SdkModel<UserLoginParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The password for login in clear text.
     */
    #[Optional]
    public ?string $password;

    /**
     * The user name for login.
     */
    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $password = null,
        ?string $username = null
    ): self {
        $self = new self;

        null !== $password && $self['password'] = $password;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * The password for login in clear text.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The user name for login.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
