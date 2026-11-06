<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class SequenceDefinitionPushResultChangesStepsRemovedItem extends JsonSerializableType
{
    /**
     * @var ?int $contacts Contacts waiting on the step.
     */
    #[JsonProperty('contacts')]
    public ?int $contacts;

    /**
     * @var ?string $contactsContinueTo Step key those contacts continue to; null when they complete.
     */
    #[JsonProperty('contactsContinueTo')]
    public ?string $contactsContinueTo;

    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   contacts?: ?int,
     *   contactsContinueTo?: ?string,
     *   key?: ?string,
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->contacts = $values['contacts'] ?? null;
        $this->contactsContinueTo = $values['contactsContinueTo'] ?? null;
        $this->key = $values['key'] ?? null;
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
