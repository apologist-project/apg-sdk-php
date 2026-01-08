<?php

declare(strict_types=1);

namespace Apologist\ServiceContracts;

use Apologist\Core\Exceptions\APIException;
use Apologist\Pet\Pet;
use Apologist\Pet\PetCreateParams\Category;
use Apologist\Pet\PetCreateParams\Status;
use Apologist\Pet\PetCreateParams\Tag;
use Apologist\Pet\PetUploadImageResponse;
use Apologist\RequestOptions;

/**
 * @phpstan-import-type CategoryShape from \Apologist\Pet\PetCreateParams\Category
 * @phpstan-import-type TagShape from \Apologist\Pet\PetCreateParams\Tag
 * @phpstan-import-type CategoryShape from \Apologist\Pet\PetUpdateParams\Category as CategoryShape1
 * @phpstan-import-type TagShape from \Apologist\Pet\PetUpdateParams\Tag as TagShape1
 * @phpstan-import-type RequestOpts from \Apologist\RequestOptions
 */
interface PetContract
{
    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param Category|CategoryShape $category
     * @param Status|value-of<Status> $status pet status in the store
     * @param list<Tag|TagShape> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        array $photoURLs,
        ?int $id = null,
        Category|array|null $category = null,
        Status|string|null $status = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID ID of pet to return
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): Pet;

    /**
     * @api
     *
     * @param list<string> $photoURLs
     * @param \Apologist\Pet\PetUpdateParams\Category|CategoryShape1 $category
     * @param \Apologist\Pet\PetUpdateParams\Status|value-of<\Apologist\Pet\PetUpdateParams\Status> $status pet status in the store
     * @param list<\Apologist\Pet\PetUpdateParams\Tag|TagShape1> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $name,
        array $photoURLs,
        ?int $id = null,
        \Apologist\Pet\PetUpdateParams\Category|array|null $category = null,
        \Apologist\Pet\PetUpdateParams\Status|string|null $status = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): Pet;

    /**
     * @api
     *
     * @param int $petID Pet id to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $petID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param \Apologist\Pet\PetFindByStatusParams\Status|value-of<\Apologist\Pet\PetFindByStatusParams\Status> $status Status values that need to be considered for filter
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByStatus(
        \Apologist\Pet\PetFindByStatusParams\Status|string $status = 'available',
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param list<string> $tags Tags to filter by
     * @param RequestOpts|null $requestOptions
     *
     * @return list<Pet>
     *
     * @throws APIException
     */
    public function findByTags(
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param int $petID ID of pet that needs to be updated
     * @param string $name Name of pet that needs to be updated
     * @param string $status Status of pet that needs to be updated
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateWithForm(
        int $petID,
        ?string $name = null,
        ?string $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param int $petID Path param: ID of pet to update
     * @param string $body Body param:
     * @param string $additionalMetadata Query param: Additional Metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadImage(
        int $petID,
        string $body,
        ?string $additionalMetadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): PetUploadImageResponse;
}
