<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\RequestOptions;
use Apologist\User\User;
use Apologist\User\UserCreateParams;
use Apologist\User\UserCreateWithListParams;
use Apologist\User\UserLoginParams;
use Apologist\User\UserUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface UserRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param array<string,mixed>|UserUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserCreateWithListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function createWithList(
        array|UserCreateWithListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserLoginParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function login(
        array|UserLoginParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function logout(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
