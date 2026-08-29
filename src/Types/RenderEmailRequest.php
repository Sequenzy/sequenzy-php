<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Personalization and output options for a render. Omit every field to render for a sample contact with clean links.
 */
class RenderEmailRequest extends JsonSerializableType
{
    /**
     * @var ?string $locale Force a localization locale instead of deriving it from the contact.
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?RenderEmailRequestSubscriber $subscriber Personalize as an ad-hoc contact. Mutually exclusive with subscriberId.
     */
    #[JsonProperty('subscriber')]
    public ?RenderEmailRequestSubscriber $subscriber;

    /**
     * @var ?string $subscriberId Personalize as this stored subscriber. Mutually exclusive with subscriber. The rendered HTML then carries that subscriber's details, so this field additionally requires the subscribers:read scope.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?bool $tracking Apply the company's auto-UTM link decoration as a real send would. Per-send click redirects and the open pixel need a real email send record and are never present in a render.
     */
    #[JsonProperty('tracking')]
    public ?bool $tracking;

    /**
     * @var ?array<string, mixed> $variables Extra merge variables layered over the contact's attributes.
     */
    #[JsonProperty('variables'), ArrayType(['string' => 'mixed'])]
    public ?array $variables;

    /**
     * @var ?string $variantId Render a specific A/B test variant. Required for sequence steps whose nodeType is action_ab_test; those steps have no email of their own. Sequence variants also need the ab_tests:read scope. Ignored for templates.
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   locale?: ?string,
     *   subscriber?: ?RenderEmailRequestSubscriber,
     *   subscriberId?: ?string,
     *   tracking?: ?bool,
     *   variables?: ?array<string, mixed>,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locale = $values['locale'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->tracking = $values['tracking'] ?? null;
        $this->variables = $values['variables'] ?? null;
        $this->variantId = $values['variantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
