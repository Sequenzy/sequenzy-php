<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetAccountInfoResponseAccount extends JsonSerializableType
{
    /**
     * @var ?value-of<GetAccountInfoResponseAccountApiKeyType> $apiKeyType API key ownership type. Workspace-bound integrations should require company so requests cannot silently select another workspace.
     */
    #[JsonProperty('apiKeyType')]
    public ?string $apiKeyType;

    /**
     * @var ?string $companyId
     */
    #[JsonProperty('companyId')]
    public ?string $companyId;

    /**
     * @var ?string $companyName
     */
    #[JsonProperty('companyName')]
    public ?string $companyName;

    /**
     * @param array{
     *   apiKeyType?: ?value-of<GetAccountInfoResponseAccountApiKeyType>,
     *   companyId?: ?string,
     *   companyName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->apiKeyType = $values['apiKeyType'] ?? null;
        $this->companyId = $values['companyId'] ?? null;
        $this->companyName = $values['companyName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
