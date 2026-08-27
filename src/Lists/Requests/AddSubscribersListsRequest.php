<?php

namespace Sequenzy\Lists\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Lists\Types\AddSubscribersListsRequestDuplicateStrategy;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Lists\Types\AddSubscribersListsRequestOptInMode;

class AddSubscribersListsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<AddSubscribersListsRequestDuplicateStrategy> $duplicateStrategy
     */
    #[JsonProperty('duplicateStrategy')]
    public ?string $duplicateStrategy;

    /**
     * @var array<string> $emails Up to 500 email addresses per request.
     */
    #[JsonProperty('emails'), ArrayType(['string'])]
    public array $emails;

    /**
     * @var ?bool $enrollInSequences
     */
    #[JsonProperty('enrollInSequences')]
    public ?bool $enrollInSequences;

    /**
     * @var ?value-of<AddSubscribersListsRequestOptInMode> $optInMode
     */
    #[JsonProperty('optInMode')]
    public ?string $optInMode;

    /**
     * @param array{
     *   emails: array<string>,
     *   duplicateStrategy?: ?value-of<AddSubscribersListsRequestDuplicateStrategy>,
     *   enrollInSequences?: ?bool,
     *   optInMode?: ?value-of<AddSubscribersListsRequestOptInMode>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->duplicateStrategy = $values['duplicateStrategy'] ?? null;
        $this->emails = $values['emails'];
        $this->enrollInSequences = $values['enrollInSequences'] ?? null;
        $this->optInMode = $values['optInMode'] ?? null;
    }
}
