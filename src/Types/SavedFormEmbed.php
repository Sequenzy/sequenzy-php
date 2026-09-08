<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class SavedFormEmbed extends JsonSerializableType
{
    /**
     * @var string $actionUrl
     */
    #[JsonProperty('actionUrl')]
    public string $actionUrl;

    /**
     * @var string $fetch Fetch-enhanced embed markup.
     */
    #[JsonProperty('fetch')]
    public string $fetch;

    /**
     * @var string $javascript Hosted JavaScript embed markup.
     */
    #[JsonProperty('javascript')]
    public string $javascript;

    /**
     * @var string $nativeForm Native HTML form embed markup.
     */
    #[JsonProperty('nativeForm')]
    public string $nativeForm;

    /**
     * @var string $scriptUrl
     */
    #[JsonProperty('scriptUrl')]
    public string $scriptUrl;

    /**
     * @var array<string> $supportedPlatforms
     */
    #[JsonProperty('supportedPlatforms'), ArrayType(['string'])]
    public array $supportedPlatforms;

    /**
     * @param array{
     *   actionUrl: string,
     *   fetch: string,
     *   javascript: string,
     *   nativeForm: string,
     *   scriptUrl: string,
     *   supportedPlatforms: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actionUrl = $values['actionUrl'];
        $this->fetch = $values['fetch'];
        $this->javascript = $values['javascript'];
        $this->nativeForm = $values['nativeForm'];
        $this->scriptUrl = $values['scriptUrl'];
        $this->supportedPlatforms = $values['supportedPlatforms'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
