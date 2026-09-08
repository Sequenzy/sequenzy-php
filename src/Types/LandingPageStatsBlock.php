<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class LandingPageStatsBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?value-of<LandingPageStatsBlockAlign> $align
     */
    #[JsonProperty('align')]
    public ?string $align;

    /**
     * @var ?int $columns
     */
    #[JsonProperty('columns')]
    public ?int $columns;

    /**
     * @var value-of<LandingPageStatsBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var array<LandingPageStatistic> $stats
     */
    #[JsonProperty('stats'), ArrayType([LandingPageStatistic::class])]
    public array $stats;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageStatsBlockSlot>,
     *   stats: array<LandingPageStatistic>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   align?: ?value-of<LandingPageStatsBlockAlign>,
     *   columns?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionAlign = $values['sectionAlign'] ?? null;
        $this->sectionId = $values['sectionId'] ?? null;
        $this->sectionKind = $values['sectionKind'] ?? null;
        $this->sectionLabel = $values['sectionLabel'] ?? null;
        $this->sectionLayout = $values['sectionLayout'] ?? null;
        $this->sectionVariant = $values['sectionVariant'] ?? null;
        $this->align = $values['align'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->slot = $values['slot'];
        $this->stats = $values['stats'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
