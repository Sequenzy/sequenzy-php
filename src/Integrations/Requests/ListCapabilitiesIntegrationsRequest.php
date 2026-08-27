<?php

namespace Sequenzy\Integrations\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListCapabilitiesIntegrationsRequest extends JsonSerializableType
{
    /**
     * @var ?string $category Filter by category: payments, ecommerce, auth, analytics, ads, affiliate, cms, or developer.
     */
    public ?string $category;

    /**
     * @var ?string $provider Return only this provider, for example stripe.
     */
    public ?string $provider;

    /**
     * @param array{
     *   category?: ?string,
     *   provider?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->category = $values['category'] ?? null;
        $this->provider = $values['provider'] ?? null;
    }
}
