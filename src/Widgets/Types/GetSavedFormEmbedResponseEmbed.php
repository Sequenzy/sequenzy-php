<?php

namespace Sequenzy\Widgets\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class GetSavedFormEmbedResponseEmbed extends JsonSerializableType
{
    /**
     * @var ?string $actionUrl
     */
    #[JsonProperty('actionUrl')]
    public ?string $actionUrl;

    /**
     * @var ?string $fetch
     */
    #[JsonProperty('fetch')]
    public ?string $fetch;

    /**
     * @var ?string $javascript
     */
    #[JsonProperty('javascript')]
    public ?string $javascript;

    /**
     * @var ?string $nativeForm
     */
    #[JsonProperty('nativeForm')]
    public ?string $nativeForm;

    /**
     * @var ?string $scriptUrl
     */
    #[JsonProperty('scriptUrl')]
    public ?string $scriptUrl;

    /**
     * @var ?array<string> $supportedPlatforms
     */
    #[JsonProperty('supportedPlatforms'), ArrayType(['string'])]
    public ?array $supportedPlatforms;

    /**
     * @param array{
     *   actionUrl?: ?string,
     *   fetch?: ?string,
     *   javascript?: ?string,
     *   nativeForm?: ?string,
     *   scriptUrl?: ?string,
     *   supportedPlatforms?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->actionUrl = $values['actionUrl'] ?? null;
        $this->fetch = $values['fetch'] ?? null;
        $this->javascript = $values['javascript'] ?? null;
        $this->nativeForm = $values['nativeForm'] ?? null;
        $this->scriptUrl = $values['scriptUrl'] ?? null;
        $this->supportedPlatforms = $values['supportedPlatforms'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
