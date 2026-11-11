<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\PushLocalization;
use Sequenzy\Push\Types\TranslatePushContentRequestPlatformsItem;

class TranslatePushContentRequest extends JsonSerializableType
{
    /**
     * @var ?string $body Main-language message.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?array<string> $locales Languages to translate into. Omit for every workspace language except the main one.
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @var ?array<PushLocalization> $localizations
     */
    #[JsonProperty('localizations'), ArrayType([PushLocalization::class])]
    public ?array $localizations;

    /**
     * @var ?bool $overwrite Retranslate versions a person wrote too.
     */
    #[JsonProperty('overwrite')]
    public ?bool $overwrite;

    /**
     * @var ?array<value-of<TranslatePushContentRequestPlatformsItem>> $platforms Accepted so a campaign body can be sent as is, but not used. Translation does not depend on the platform.
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var ?string $title Main-language title. A title or a body is required.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @param array{
     *   body?: ?string,
     *   locales?: ?array<string>,
     *   localizations?: ?array<PushLocalization>,
     *   overwrite?: ?bool,
     *   platforms?: ?array<value-of<TranslatePushContentRequestPlatformsItem>>,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->locales = $values['locales'] ?? null;
        $this->localizations = $values['localizations'] ?? null;
        $this->overwrite = $values['overwrite'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
        $this->title = $values['title'] ?? null;
    }
}
