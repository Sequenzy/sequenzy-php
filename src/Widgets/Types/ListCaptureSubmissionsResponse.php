<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ListCaptureSubmissionsResponse extends JsonSerializableType
{
    /**
     * @var ?string $csv Present only for format=csv.
     */
    #[JsonProperty('csv')]
    public ?string $csv;

    /**
     * @var ?string $nextCursor
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @var ListCaptureSubmissionsResponseSource $source
     */
    #[JsonProperty('source')]
    public ListCaptureSubmissionsResponseSource $source;

    /**
     * @var array<ListCaptureSubmissionsResponseSubmissionsItem> $submissions
     */
    #[JsonProperty('submissions'), ArrayType([ListCaptureSubmissionsResponseSubmissionsItem::class])]
    public array $submissions;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   source: ListCaptureSubmissionsResponseSource,
     *   submissions: array<ListCaptureSubmissionsResponseSubmissionsItem>,
     *   success: bool,
     *   csv?: ?string,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->csv = $values['csv'] ?? null;
        $this->nextCursor = $values['nextCursor'] ?? null;
        $this->source = $values['source'];
        $this->submissions = $values['submissions'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
