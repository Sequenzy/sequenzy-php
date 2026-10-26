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
     * @var string $fetch Fetch-enhanced embed markup. Has weaker spam protection; use only on pages that cannot run scripts.
     */
    #[JsonProperty('fetch')]
    public string $fetch;

    /**
     * @var string $javascript Hosted JavaScript embed markup. The recommended install, and the only one that carries Sequenzy's spam protection (signed submit token and, with bot protection on, the bot check). The form appears right after the script tag, unless the page has a placeholder for it.
     */
    #[JsonProperty('javascript')]
    public string $javascript;

    /**
     * @var string $nativeForm Native HTML form embed markup. Has weaker spam protection; use only on pages that cannot run scripts.
     */
    #[JsonProperty('nativeForm')]
    public string $nativeForm;

    /**
     * @var ?string $placeholder Optional placeholder for the javascript embed, such as `<div data-sequenzy-form="form_123"></div>`. Put it where the form should appear when the script has to load elsewhere (the page head, a tag manager or a site-wide footer); the script fills it. Each script tag fills one placeholder.
     */
    #[JsonProperty('placeholder')]
    public ?string $placeholder;

    /**
     * @var ?value-of<SavedFormEmbedRecommendedSnippet> $recommendedSnippet The snippet to install unless the page cannot run scripts.
     */
    #[JsonProperty('recommendedSnippet')]
    public ?string $recommendedSnippet;

    /**
     * @var ?string $reducedProtectionWarning What changes when nativeForm or fetch is used instead of javascript, worded for the form's current bot protection setting. Show it to the person installing the form.
     */
    #[JsonProperty('reducedProtectionWarning')]
    public ?string $reducedProtectionWarning;

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
     *   placeholder?: ?string,
     *   recommendedSnippet?: ?value-of<SavedFormEmbedRecommendedSnippet>,
     *   reducedProtectionWarning?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actionUrl = $values['actionUrl'];
        $this->fetch = $values['fetch'];
        $this->javascript = $values['javascript'];
        $this->nativeForm = $values['nativeForm'];
        $this->placeholder = $values['placeholder'] ?? null;
        $this->recommendedSnippet = $values['recommendedSnippet'] ?? null;
        $this->reducedProtectionWarning = $values['reducedProtectionWarning'] ?? null;
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
