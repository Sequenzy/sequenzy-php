<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * The email's breakdown, `null` until it has been analyzed. Counts come from its HTML; `voice`, `language`, `structure` and `takeaways` from AI reading the copy. Any field is `null` (or an empty list) when unknown.
 */
class GalleryEmailAnalysis extends JsonSerializableType
{
    /**
     * @var ?int $buttonCount
     */
    #[JsonProperty('buttonCount')]
    public ?int $buttonCount;

    /**
     * @var ?array<string> $buttonLabels Button labels in reading order, up to 5.
     */
    #[JsonProperty('buttonLabels'), ArrayType(['string'])]
    public ?array $buttonLabels;

    /**
     * @var ?value-of<GalleryEmailAnalysisColumns> $columns
     */
    #[JsonProperty('columns')]
    public ?string $columns;

    /**
     * @var ?bool $darkMode Whether the email ships custom `prefers-color-scheme` dark styles.
     */
    #[JsonProperty('darkMode')]
    public ?bool $darkMode;

    /**
     * @var ?array<string> $fonts Most used font families, up to 3.
     */
    #[JsonProperty('fonts'), ArrayType(['string'])]
    public ?array $fonts;

    /**
     * @var ?value-of<GalleryEmailAnalysisFormat> $format
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?bool $hasGif
     */
    #[JsonProperty('hasGif')]
    public ?bool $hasGif;

    /**
     * @var ?int $imageCount Content images; icons and spacers are left out.
     */
    #[JsonProperty('imageCount')]
    public ?int $imageCount;

    /**
     * @var ?string $language BCP 47 language code, such as `en`.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?int $linkCount Links of any kind, buttons included.
     */
    #[JsonProperty('linkCount')]
    public ?int $linkCount;

    /**
     * @var ?string $mainButton Label of the first button, the primary call to action.
     */
    #[JsonProperty('mainButton')]
    public ?string $mainButton;

    /**
     * @var ?int $readingTimeSeconds
     */
    #[JsonProperty('readingTimeSeconds')]
    public ?int $readingTimeSeconds;

    /**
     * @var ?GalleryEmailAnalysisSender $sender The sender as shown on gallery pages, with personal details redacted. `null` when unknown.
     */
    #[JsonProperty('sender')]
    public ?GalleryEmailAnalysisSender $sender;

    /**
     * @var ?array<string> $structure The email's beats in order, such as "Logo header" and "Primary button".
     */
    #[JsonProperty('structure'), ArrayType(['string'])]
    public ?array $structure;

    /**
     * @var ?array<string> $takeaways Why the email works, as observations about its choices. Never performance claims.
     */
    #[JsonProperty('takeaways'), ArrayType(['string'])]
    public ?array $takeaways;

    /**
     * @var ?value-of<GalleryEmailAnalysisVoice> $voice
     */
    #[JsonProperty('voice')]
    public ?string $voice;

    /**
     * @var ?int $wordCount
     */
    #[JsonProperty('wordCount')]
    public ?int $wordCount;

    /**
     * @param array{
     *   buttonCount?: ?int,
     *   buttonLabels?: ?array<string>,
     *   columns?: ?value-of<GalleryEmailAnalysisColumns>,
     *   darkMode?: ?bool,
     *   fonts?: ?array<string>,
     *   format?: ?value-of<GalleryEmailAnalysisFormat>,
     *   hasGif?: ?bool,
     *   imageCount?: ?int,
     *   language?: ?string,
     *   linkCount?: ?int,
     *   mainButton?: ?string,
     *   readingTimeSeconds?: ?int,
     *   sender?: ?GalleryEmailAnalysisSender,
     *   structure?: ?array<string>,
     *   takeaways?: ?array<string>,
     *   voice?: ?value-of<GalleryEmailAnalysisVoice>,
     *   wordCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buttonCount = $values['buttonCount'] ?? null;
        $this->buttonLabels = $values['buttonLabels'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->darkMode = $values['darkMode'] ?? null;
        $this->fonts = $values['fonts'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->hasGif = $values['hasGif'] ?? null;
        $this->imageCount = $values['imageCount'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->linkCount = $values['linkCount'] ?? null;
        $this->mainButton = $values['mainButton'] ?? null;
        $this->readingTimeSeconds = $values['readingTimeSeconds'] ?? null;
        $this->sender = $values['sender'] ?? null;
        $this->structure = $values['structure'] ?? null;
        $this->takeaways = $values['takeaways'] ?? null;
        $this->voice = $values['voice'] ?? null;
        $this->wordCount = $values['wordCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
