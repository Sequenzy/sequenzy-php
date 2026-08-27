<?php

namespace Sequenzy\Lists\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class AddSubscribersListsResponse extends JsonSerializableType
{
    /**
     * @var ?int $addedToList
     */
    #[JsonProperty('addedToList')]
    public ?int $addedToList;

    /**
     * @var ?int $created
     */
    #[JsonProperty('created')]
    public ?int $created;

    /**
     * @var ?int $duplicateInputCount
     */
    #[JsonProperty('duplicateInputCount')]
    public ?int $duplicateInputCount;

    /**
     * @var ?int $failed
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?int $ignoredBlankCount
     */
    #[JsonProperty('ignoredBlankCount')]
    public ?int $ignoredBlankCount;

    /**
     * @var ?string $listId
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?int $processed
     */
    #[JsonProperty('processed')]
    public ?int $processed;

    /**
     * @var ?array<AddSubscribersListsResponseResultsItem> $results
     */
    #[JsonProperty('results'), ArrayType([AddSubscribersListsResponseResultsItem::class])]
    public ?array $results;

    /**
     * @var ?int $skipped
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $updated
     */
    #[JsonProperty('updated')]
    public ?int $updated;

    /**
     * @param array{
     *   addedToList?: ?int,
     *   created?: ?int,
     *   duplicateInputCount?: ?int,
     *   failed?: ?int,
     *   ignoredBlankCount?: ?int,
     *   listId?: ?string,
     *   processed?: ?int,
     *   results?: ?array<AddSubscribersListsResponseResultsItem>,
     *   skipped?: ?int,
     *   success?: ?bool,
     *   total?: ?int,
     *   updated?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addedToList = $values['addedToList'] ?? null;
        $this->created = $values['created'] ?? null;
        $this->duplicateInputCount = $values['duplicateInputCount'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->ignoredBlankCount = $values['ignoredBlankCount'] ?? null;
        $this->listId = $values['listId'] ?? null;
        $this->processed = $values['processed'] ?? null;
        $this->results = $values['results'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->updated = $values['updated'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
