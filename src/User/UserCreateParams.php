<?php

declare(strict_types=1);

namespace Apologist\User;

use Apologist\Core\Attributes\Optional;
use Apologist\Core\Concerns\SdkModel;
use Apologist\Core\Concerns\SdkParams;
use Apologist\Core\Contracts\BaseModel;

/**
 * This can only be done by the logged in user.
 *
 * @see Apologist\Services\UserService::create()
 *
 * @phpstan-type UserCreateParamsShape = array{
 *   id?: int,
 *   email?: string,
 *   firstName?: string,
 *   lastName?: string,
 *   password?: string,
 *   phone?: string,
 *   username?: string,
 *   userStatus?: int,
 * }
 */
final class UserCreateParams implements BaseModel
{
    /** @use SdkModel<UserCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $firstName;

    #[Optional]
    public ?string $lastName;

    #[Optional]
    public ?string $password;

    #[Optional]
    public ?string $phone;

    #[Optional]
    public ?string $username;

    /**
     * User Status.
     */
    #[Optional]
    public ?int $userStatus;

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
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;
        null !== $password && $self['password'] = $password;
        null !== $phone && $self['phone'] = $phone;
        null !== $username && $self['username'] = $username;
        null !== $userStatus && $self['userStatus'] = $userStatus;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    public function withPhone(string $phone): self
    {
        $self = clone $this;
        $self['phone'] = $phone;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }

    /**
     * User Status.
     */
    public function withUserStatus(int $userStatus): self
    {
        $self = clone $this;
        $self['userStatus'] = $userStatus;

        return $self;
    }
}
