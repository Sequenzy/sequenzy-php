<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Personalization and options for an email check. Omit every field to check for a sample contact with live link verification on.
 */
class CheckEmailRequest extends JsonSerializableType
{
    /**
     * @var ?bool $links Verify every link and image over the network: HTTP status, redirects, DNS, TLS certificates, and image type and size. Pass false for a fast, rules-only check.
     */
    #[JsonProperty('links')]
    public ?bool $links;

    /**
     * @var ?string $locale Check a specific localization instead of deriving it from the contact.
     */
    #[JsonProperty('locale')]
    public ?string $locale;

    /**
     * @var ?CheckEmailRequestSubscriber $subscriber Check as an ad-hoc contact. Mutually exclusive with subscriberId.
     */
    #[JsonProperty('subscriber')]
    public ?CheckEmailRequestSubscriber $subscriber;

    /**
     * @var ?string $subscriberId Check as this stored subscriber: picks their localization and reports merge tags and conditions that would not resolve for them. Link and content rules always run on the email as written. Mutually exclusive with subscriber. Requires the subscribers:read scope as well.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

    /**
     * @var ?array<string, mixed> $variables Extra merge variables layered over the contact's attributes.
     */
    #[JsonProperty('variables'), ArrayType(['string' => 'mixed'])]
    public ?array $variables;

    /**
     * @var ?string $variantId Check a specific A/B test variant. Required for sequence steps whose nodeType is action_ab_test. Sequence variants also need the ab_tests:read scope. Ignored for templates.
     */
    #[JsonProperty('variantId')]
    public ?string $variantId;

    /**
     * @param array{
     *   links?: ?bool,
     *   locale?: ?string,
     *   subscriber?: ?CheckEmailRequestSubscriber,
     *   subscriberId?: ?string,
     *   variables?: ?array<string, mixed>,
     *   variantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->links = $values['links'] ?? null;
        $this->locale = $values['locale'] ?? null;
        $this->subscriber = $values['subscriber'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
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
