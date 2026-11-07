<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SendTestEmailSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $customAttributes Optional custom attributes to render the test as, for example `{"trader_type":"prop_firm"}`. They override each reviewer's stored attributes for merge tags and block conditions in this test only. No contact is created or changed. When a reviewer is a stored contact, email, first name, last name and full name keys such as `firstName` or `name` come from that contact and are ignored.
     */
    #[JsonProperty('customAttributes'), ArrayType(['string' => 'mixed'])]
    public ?array $customAttributes;

    /**
     * @var array<string> $recipients Internal reviewer email addresses. Duplicate addresses are sent only once.
     */
    #[JsonProperty('recipients'), ArrayType(['string'])]
    public array $recipients;

    /**
     * @param array{
     *   recipients: array<string>,
     *   customAttributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customAttributes = $values['customAttributes'] ?? null;
        $this->recipients = $values['recipients'];
    }
}
