<?php

namespace Sequenzy\Integrations\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * RevenueCat, Superwall and Adapty only, when the company category is not already `mobile_app` and was not chosen by a user (`websiteTypeSource` is not `user`). A suggestion to apply with [Update Company](/api-reference/companies/update) (`websiteType`); nothing is changed.
 */
class ConnectIntegrationsResponseWebsiteTypeSuggestion extends JsonSerializableType
{
    /**
     * @var ?string $reason
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<ConnectIntegrationsResponseWebsiteTypeSuggestionWebsiteType> $websiteType
     */
    #[JsonProperty('websiteType')]
    public ?string $websiteType;

    /**
     * @param array{
     *   reason?: ?string,
     *   websiteType?: ?value-of<ConnectIntegrationsResponseWebsiteTypeSuggestionWebsiteType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->reason = $values['reason'] ?? null;
        $this->websiteType = $values['websiteType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
