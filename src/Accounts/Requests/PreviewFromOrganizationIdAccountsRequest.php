<?php

namespace Sequenzy\Accounts\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Accounts\Types\PreviewFromOrganizationIdAccountsRequestSource;

class PreviewFromOrganizationIdAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Organizations to return. Values outside 1-50 are clamped; non-numeric values use the default.
     */
    public ?int $limit;

    /**
     * @var ?string $nameKey Property or attribute holding the organization name.
     */
    public ?string $nameKey;

    /**
     * @var string $propertyKey Event property or contact attribute holding your organization ID.
     */
    public string $propertyKey;

    /**
     * @var ?value-of<PreviewFromOrganizationIdAccountsRequestSource> $source Where the ID lives.
     */
    public ?string $source;

    /**
     * @param array{
     *   propertyKey: string,
     *   limit?: ?int,
     *   nameKey?: ?string,
     *   source?: ?value-of<PreviewFromOrganizationIdAccountsRequestSource>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->nameKey = $values['nameKey'] ?? null;
        $this->propertyKey = $values['propertyKey'];
        $this->source = $values['source'] ?? null;
    }
}
