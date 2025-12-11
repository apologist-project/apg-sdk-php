<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Exceptions\APIException;
use Apologist\Core\Util;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\UserContract;
use Apologist\User\User;

final class UserService implements UserContract
{
    /**
     * @api
     */
    public UserRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UserRawService($client);
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
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
    ): User {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'phone' => $phone,
                'username' => $username,
                'userStatus' => $userStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get user by user name
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        ?RequestOptions $requestOptions = null
    ): User {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($username, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'password' => $password,
                'phone' => $phone,
                'username' => $username,
                'userStatus' => $userStatus,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($existingUsername, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
     *
     * @param string $username The name that needs to be deleted
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($username, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Creates list of users with given input array
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
    ): User {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createWithList(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Logs user into the system
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
    ): string {
        $params = Util::removeNulls(
            ['password' => $password, 'username' => $username]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->login(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Logs out current logged in user session
     *
     * @throws APIException
     */
    public function logout(?RequestOptions $requestOptions = null): mixed
    {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->logout(requestOptions: $requestOptions);

        return $response->parse();
    }
}
