<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSuppressionsResponseSuppressionSes extends JsonSerializableType
{
    /**
     * @var ?array<GetSuppressionsResponseSuppressionSesEntriesItem> $entries
     */
    #[JsonProperty('entries'), ArrayType([GetSuppressionsResponseSuppressionSesEntriesItem::class])]
    public ?array $entries;

    /**
     * @var ?array<string> $regionsChecked
     */
    #[JsonProperty('regionsChecked'), ArrayType(['string'])]
    public ?array $regionsChecked;

    /**
     * @param array{
     *   entries?: ?array<GetSuppressionsResponseSuppressionSesEntriesItem>,
     *   regionsChecked?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->entries = $values['entries'] ?? null;
        $this->regionsChecked = $values['regionsChecked'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
