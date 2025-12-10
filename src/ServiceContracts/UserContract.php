<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\User\User;

interface UserContract
{
    /**
     * @api
     *
     * @param int $userStatus User Status
     *
     * @throws APIException
     */
    public function create(
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
        ?RequestOptions $requestOptions = null,
    ): User;

    /**
     * @api
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        ?RequestOptions $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param int $userStatus User Status
     *
     * @throws APIException
     */
    public function update(
        string $existingUsername,
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $username The name that needs to be deleted
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<array{
     *   id?: int,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   password?: string,
     *   phone?: string,
     *   username?: string,
     *   userStatus?: int,
     * }|User> $body
     *
     * @throws APIException
     */
    public function createWithList(
        ?array $body = null,
        ?RequestOptions $requestOptions = null
    ): User;

    /**
     * @api
     *
     * @param string $password The password for login in clear text
     * @param string $username The user name for login
     *
     * @throws APIException
     */
    public function login(
        ?string $password = null,
        ?string $username = null,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function logout(?RequestOptions $requestOptions = null): mixed;
}
