<?php

namespace Sequenzy\AbTests\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class GetStatsAbTestsResponse extends JsonSerializableType
{
    /**
     * @var ?string $abTestId
     */
    #[JsonProperty('abTestId')]
    public ?string $abTestId;

    /**
     * @var ?DateTime $end
     */
    #[JsonProperty('end'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $end;

    /**
     * @var ?string $period
     */
    #[JsonProperty('period')]
    public ?string $period;

    /**
     * @var ?DateTime $start
     */
    #[JsonProperty('start'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $start;

    /**
     * @var ?array<string, mixed> $stats
     */
    #[JsonProperty('stats'), ArrayType(['string' => 'mixed'])]
    public ?array $stats;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?array<GetStatsAbTestsResponseVariantsItem> $variants
     */
    #[JsonProperty('variants'), ArrayType([GetStatsAbTestsResponseVariantsItem::class])]
    public ?array $variants;

    /**
     * @param array{
     *   abTestId?: ?string,
     *   end?: ?DateTime,
     *   period?: ?string,
     *   start?: ?DateTime,
     *   stats?: ?array<string, mixed>,
     *   success?: ?bool,
     *   variants?: ?array<GetStatsAbTestsResponseVariantsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->abTestId = $values['abTestId'] ?? null;
        $this->end = $values['end'] ?? null;
        $this->period = $values['period'] ?? null;
        $this->start = $values['start'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->variants = $values['variants'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
