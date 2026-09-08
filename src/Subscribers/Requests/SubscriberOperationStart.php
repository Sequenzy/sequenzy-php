<?php

namespace Sequenzy\Subscribers\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Subscribers\Types\SubscriberOperationStartAudience;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Subscribers\Types\SubscriberOperationStartKind;
use Sequenzy\Core\Types\ArrayType;

class SubscriberOperationStart extends JsonSerializableType
{
    /**
     * @var ?SubscriberOperationStartAudience $audience Defaults to all contacts. Selection walks live pages before mutations, excludes contacts created after the request, and is not a point-in-time database snapshot. Provide root or filters, never both.
     */
    #[JsonProperty('audience')]
    public ?SubscriberOperationStartAudience $audience;

    /**
     * @var value-of<SubscriberOperationStartKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var string $requestKey Reuse after an uncertain response. Different normalized settings with the same company/key return 409.
     */
    #[JsonProperty('requestKey')]
    public string $requestKey;

    /**
     * @var array<string> $tags Tag names, normalized like single-contact tags.
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public array $tags;

    /**
     * @var ?bool $triggerAutomations Requires automations:trigger.
     */
    #[JsonProperty('triggerAutomations')]
    public ?bool $triggerAutomations;

    /**
     * @param array{
     *   kind: value-of<SubscriberOperationStartKind>,
     *   requestKey: string,
     *   tags: array<string>,
     *   audience?: ?SubscriberOperationStartAudience,
     *   triggerAutomations?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->audience = $values['audience'] ?? null;
        $this->kind = $values['kind'];
        $this->requestKey = $values['requestKey'];
        $this->tags = $values['tags'];
        $this->triggerAutomations = $values['triggerAutomations'] ?? null;
    }
}
