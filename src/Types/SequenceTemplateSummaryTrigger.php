<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceTemplateSummaryTrigger extends JsonSerializableType
{
    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $eventName
     */
    #[JsonProperty('eventName')]
    public ?string $eventName;

    /**
     * @var ?int $inactiveDays
     */
    #[JsonProperty('inactiveDays')]
    public ?int $inactiveDays;

    /**
     * @var ?string $tagName
     */
    #[JsonProperty('tagName')]
    public ?string $tagName;

    /**
     * @var ?value-of<SequenceTemplateSummaryTriggerType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   description?: ?string,
     *   eventName?: ?string,
     *   inactiveDays?: ?int,
     *   tagName?: ?string,
     *   type?: ?value-of<SequenceTemplateSummaryTriggerType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->eventName = $values['eventName'] ?? null;
        $this->inactiveDays = $values['inactiveDays'] ?? null;
        $this->tagName = $values['tagName'] ?? null;
        $this->type = $values['type'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
