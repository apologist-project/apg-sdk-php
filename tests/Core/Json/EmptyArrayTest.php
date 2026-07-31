<?php

namespace ApologistAi\Tests\Core\Json;

use PHPUnit\Framework\TestCase;
use ApologistAi\Core\Json\JsonEncoder;
use ApologistAi\Core\Json\JsonProperty;
use ApologistAi\Core\Json\JsonSerializableType;
use ApologistAi\Core\Types\ArrayType;
use ApologistAi\Core\Types\Union;

class EmptyArray extends JsonSerializableType
{
    /**
     * @var string[] $emptyStringArray
     */
    #[ArrayType(['string'])]
    #[JsonProperty('empty_string_array')]
    public array $emptyStringArray;

    /**
     * @var array<string, string|null> $emptyMapArray
     */
    #[JsonProperty('empty_map_array')]
    #[ArrayType(['integer' => new Union('string', 'null')])]
    public array $emptyMapArray;

    /**
     * @var array<string|null> $emptyDatesArray
     */
    #[ArrayType([new Union('date', 'null')])]
    #[JsonProperty('empty_dates_array')]
    public array $emptyDatesArray;

    /**
     * @param array{
     *   emptyStringArray: string[],
     *   emptyMapArray: array<string, string|null>,
     *   emptyDatesArray: array<string|null>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->emptyStringArray = $values['emptyStringArray'];
        $this->emptyMapArray = $values['emptyMapArray'];
        $this->emptyDatesArray = $values['emptyDatesArray'];
    }
}

class EmptyArrayTest extends TestCase
{
    public function testEmptyArray(): void
    {
        $inputJson = JsonEncoder::encode(
            [
                'empty_string_array' => [],
                'empty_map_array' => [],
                'empty_dates_array' => []
            ],
        );

        $object = EmptyArray::fromJson($inputJson);
        $this->assertEmpty($object->emptyStringArray, 'empty_string_array should be empty.');
        $this->assertEmpty($object->emptyMapArray, 'empty_map_array should be empty.');
        $this->assertEmpty($object->emptyDatesArray, 'empty_dates_array should be empty.');

        $actualJson = $object->toJson();
        $expectedJson = JsonEncoder::encode(
            [
                'empty_string_array' => [],
                'empty_map_array' => new \stdClass(),
                'empty_dates_array' => []
            ],
        );
        $this->assertJsonStringEqualsJsonString($expectedJson, $actualJson, 'Serialized JSON does not match expected JSON for EmptyArraysType.');
    }
}
