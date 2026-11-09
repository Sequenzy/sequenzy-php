<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * One language's version of a push. Title and body are its own; a null url or imageUrl uses the main one. Each contact gets the version for their language attribute (Settings > Localization), else their device's OS language, else the workspace fallback language. Languages without a version, and versions for languages no longer in the workspace's list, get the main title and body.
 */
class PushLocalization extends JsonSerializableType
{
    /**
     * @var string $body Message in this language. Merge tags work.
     */
    #[JsonProperty('body')]
    public string $body;

    /**
     * @var ?string $imageUrl Image for this language. null uses the main image.
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var string $locale Language code such as de, fr or pt-BR. Stored in canonical form; each language appears once.
     */
    #[JsonProperty('locale')]
    public string $locale;

    /**
     * @var ?value-of<PushLocalizationOrigin> $origin ai for AI translations, manual for versions a person wrote. Translate requests keep manual versions unless overwrite is true.
     */
    #[JsonProperty('origin')]
    public ?string $origin;

    /**
     * @var ?string $sourceHash Fingerprint of the main title and body this version was written from. When it no longer matches, the dashboard shows the version as outdated; outdated versions still send. Send back the value you read.
     */
    #[JsonProperty('sourceHash')]
    public ?string $sourceHash;

    /**
     * @var string $title Title in this language. A version needs a title or a body. Merge tags work.
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $url Link for this language. null uses the main link.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   body: string,
     *   locale: string,
     *   title: string,
     *   imageUrl?: ?string,
     *   origin?: ?value-of<PushLocalizationOrigin>,
     *   sourceHash?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->locale = $values['locale'];
        $this->origin = $values['origin'] ?? null;
        $this->sourceHash = $values['sourceHash'] ?? null;
        $this->title = $values['title'];
        $this->url = $values['url'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
