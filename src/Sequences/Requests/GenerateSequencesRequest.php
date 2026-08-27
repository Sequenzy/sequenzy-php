<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GenerateSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?float $durationDays Duration used to space suggested delays. Defaults to 14.
     */
    #[JsonProperty('durationDays')]
    public ?float $durationDays;

    /**
     * @var ?float $emailCount Number of emails to generate. Defaults to 5. Maximum is 10.
     */
    #[JsonProperty('emailCount')]
    public ?float $emailCount;

    /**
     * @var string $goal Sequence goal or desired subscriber journey.
     */
    #[JsonProperty('goal')]
    public string $goal;

    /**
     * @var ?string $listId Optional list ID that scopes the contact_added trigger.
     */
    #[JsonProperty('listId')]
    public ?string $listId;

    /**
     * @var ?string $name Optional sequence name. Defaults to the normalized goal.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   goal: string,
     *   durationDays?: ?float,
     *   emailCount?: ?float,
     *   listId?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->durationDays = $values['durationDays'] ?? null;
        $this->emailCount = $values['emailCount'] ?? null;
        $this->goal = $values['goal'];
        $this->listId = $values['listId'] ?? null;
        $this->name = $values['name'] ?? null;
    }
}
