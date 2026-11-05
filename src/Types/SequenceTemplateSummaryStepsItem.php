<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceTemplateSummaryStepsItem extends JsonSerializableType
{
    /**
     * @var ?int $absoluteDay
     */
    #[JsonProperty('absoluteDay')]
    public ?int $absoluteDay;

    /**
     * @var ?value-of<SequenceTemplateSummaryStepsItemChannel> $channel
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $step
     */
    #[JsonProperty('step')]
    public ?int $step;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   absoluteDay?: ?int,
     *   channel?: ?value-of<SequenceTemplateSummaryStepsItemChannel>,
     *   description?: ?string,
     *   step?: ?int,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->absoluteDay = $values['absoluteDay'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->step = $values['step'] ?? null;
        $this->title = $values['title'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
