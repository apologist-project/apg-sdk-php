<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Contracts\BaseResponse;
use Apologist\Core\Exceptions\APIException;
use Apologist\Pet\Pet;
use Apologist\Pet\PetCreateParams;
use Apologist\Pet\PetFindByStatusParams;
use Apologist\Pet\PetFindByTagsParams;
use Apologist\Pet\PetUpdateParams;
use Apologist\Pet\PetUpdateWithFormParams;
use Apologist\Pet\PetUploadImageParams;
use Apologist\Pet\PetUploadImageResponse;
use Apologist\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface PetRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function create(
        array|PetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID ID of pet to return
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function update(
        array|PetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID Pet id to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetFindByStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByStatus(
        array|PetFindByStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PetFindByTagsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByTags(
        array|PetFindByTagsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param array<string,mixed>|PetUpdateWithFormParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        array|PetUpdateWithFormParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param array<string,mixed>|PetUploadImageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PetUploadImageResponse>
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        array|PetUploadImageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
