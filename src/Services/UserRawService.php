<?php

declare(strict_types=1);

namespace Apologist\Services;

use Apologist\Client;
use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\ServiceContracts\UserRawContract;
use Apologist\User\User;
use Apologist\User\UserCreateParams;
use Apologist\User\UserCreateWithListParams;
use Apologist\User\UserLoginParams;
use Apologist\User\UserUpdateParams;

/**
 * @phpstan-import-type UserShape from \Apologist\User\User
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
final class UserRawService implements UserRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This can only be done by the logged in user.
     *
     * @param array{
     *   id?: int,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   password?: string,
     *   phone?: string,
     *   username?: string,
     *   userStatus?: int,
     * }|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'user',
            body: (object) $parsed,
            options: $options,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * Get user by user name
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['user/%1$s', $username],
            options: $requestOptions,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param array{
     *   id?: int,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   password?: string,
     *   phone?: string,
     *   username?: string,
     *   userStatus?: int,
     * }|UserUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $existingUsername,
        array|UserUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['user/%1$s', $existingUsername],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This can only be done by the logged in user.
     *
     * @param string $username The name that needs to be deleted
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['user/%1$s', $username],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Creates list of users with given input array
     *
     * @param array{body?: list<User|UserShape>}|UserCreateWithListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function createWithList(
        array|UserCreateWithListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserCreateWithListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'user/createWithList',
            body: $parsed['body'],
            options: $options,
            convert: User::class,
        );
    }

    /**
     * @api
     *
     * Logs user into the system
     *
     * @param array{password?: string, username?: string}|UserLoginParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function login(
        array|UserLoginParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserLoginParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'user/login',
            query: $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Logs out current logged in user session
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'user/logout',
            options: $requestOptions,
            convert: null,
        );
    }
}
