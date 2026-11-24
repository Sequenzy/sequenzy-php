<?php

namespace Sequenzy\Sequences\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\Pagination;

class ListStepConditionalBlockSubscribersAliasSequencesResponse extends JsonSerializableType
{
    /**
     * @var ?string $blockId
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $branch
     */
    #[JsonProperty('branch')]
    public ?string $branch;

    /**
     * @var ?string $branchLabel
     */
    #[JsonProperty('branchLabel')]
    public ?string $branchLabel;

    /**
     * @var ?array<array<string, mixed>> $items
     */
    #[JsonProperty('items'), ArrayType([['string' => 'mixed']])]
    public ?array $items;

    /**
     * @var ?Pagination $pagination
     */
    #[JsonProperty('pagination')]
    public ?Pagination $pagination;

    /**
     * @var ?string $sourceId
     */
    #[JsonProperty('sourceId')]
    public ?string $sourceId;

    /**
     * @var ?string $sourceType
     */
    #[JsonProperty('sourceType')]
    public ?string $sourceType;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $timedOut
     */
    #[JsonProperty('timedOut')]
    public ?bool $timedOut;

    /**
     * @var ?int $total
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   blockId?: ?string,
     *   branch?: ?string,
     *   branchLabel?: ?string,
     *   items?: ?array<array<string, mixed>>,
     *   pagination?: ?Pagination,
     *   sourceId?: ?string,
     *   sourceType?: ?string,
     *   success?: ?bool,
     *   timedOut?: ?bool,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->branch = $values['branch'] ?? null;
        $this->branchLabel = $values['branchLabel'] ?? null;
        $this->items = $values['items'] ?? null;
        $this->pagination = $values['pagination'] ?? null;
        $this->sourceId = $values['sourceId'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->timedOut = $values['timedOut'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
