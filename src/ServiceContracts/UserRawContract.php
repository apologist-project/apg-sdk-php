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

interface UserRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserCreateParams $params
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function create(
        array|UserCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $username The name that needs to be fetched. Use user1 for testing.
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function retrieve(
        string $username,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $existingUsername The username that needs to be replaced
     * @param array<mixed>|UserUpdateParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function update(
        string $existingUsername,
        array|UserUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $username The name that needs to be deleted
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $username,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserCreateWithListParams $params
     *
     * @return BaseResponse<User>
     *
     * @throws APIException
     */
    public function createWithList(
        array|UserCreateWithListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserLoginParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function login(
        array|UserLoginParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function logout(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
