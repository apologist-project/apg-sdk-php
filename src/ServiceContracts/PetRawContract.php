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

interface PetRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|PetCreateParams $params
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function create(
        array|PetCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID ID of pet to return
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PetUpdateParams $params
     *
     * @return BaseResponse<Pet>
     *
     * @throws APIException
     */
    public function update(
        array|PetUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID Pet id to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PetFindByStatusParams $params
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByStatus(
        array|PetFindByStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|PetFindByTagsParams $params
     *
     * @return BaseResponse<list<Pet>>
     *
     * @throws APIException
     */
    public function findByTags(
        array|PetFindByTagsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param array<mixed>|PetUpdateWithFormParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        array|PetUpdateWithFormParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param array<mixed>|PetUploadImageParams $params
     *
     * @return BaseResponse<PetUploadImageResponse>
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        array|PetUploadImageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
