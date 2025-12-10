<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Exceptions\APIException;
use Apologist\Pet\Pet;
use Apologist\Pet\PetCreateParams\Status;
use Apologist\Pet\PetUploadImageResponse;
use Apologist\RequestOptions;

interface PetContract
{
    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param array{id?: int, name?: string} $category
     * @param 'available'|'pending'|'sold'|Status $status pet status in the store
     * @param list<array{id?: int, name?: string}> $tags
     *
     * @throws APIException
     */
    public function create(
        string $name,
        array $photoURLs,
        ?int $id = null,
        ?array $category = null,
        string|Status|null $status = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID ID of pet to return
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): Pet;

    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param array{id?: int, name?: string} $category
     * @param 'available'|'pending'|'sold'|\Apologist\Pet\PetUpdateParams\Status $status pet status in the store
     * @param list<array{id?: int, name?: string}> $tags
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array $photoURLs,
        ?int $id = null,
        ?array $category = null,
        string|\Apologist\Pet\PetUpdateParams\Status|null $status = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID Pet id to delete
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param 'available'|'pending'|'sold'|\Apologist\Pet\PetFindByStatusParams\Status $status Status values that need to be considered for filter
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByStatus(
        string|\Apologist\Pet\PetFindByStatusParams\Status $status = 'available',
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param list<string> $tags Tags to filter by
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByTags(
        ?array $tags = null,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param string $name Name of pet that needs to be updated
     * @param string $status Status of pet that needs to be updated
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        ?string $name = null,
        ?string $status = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param string $additionalMetadata Query param: Additional Metadata
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        ?string $additionalMetadata = null,
        ?RequestOptions $requestOptions = null,
    ): PetUploadImageResponse;
}
