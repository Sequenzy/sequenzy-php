<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * Independent version 1 appearance snapshot. No source copy, links or bindings are stored in block styles. Unsupported versions are returned as null.
 */
class EmailAiStyleStateStyle extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $blocks Appearance records keyed by block type and discriminator, not source email blocks.
     */
    #[JsonProperty('blocks'), ArrayType([['string' => 'mixed']])]
    public ?array $blocks;

    /**
     * @var ?value-of<EmailAiStyleStateStyleEmailPreset> $emailPreset
     */
    #[JsonProperty('emailPreset')]
    public ?string $emailPreset;

    /**
     * @var ?string $fontFamily
     */
    #[JsonProperty('fontFamily')]
    public ?string $fontFamily;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?EmailAiStyleStateStyleLayout $layout Structure guidance captured with the appearance. Absent on snapshots saved before layout habits existed.
     */
    #[JsonProperty('layout')]
    public ?EmailAiStyleStateStyleLayout $layout;

    /**
     * @var ?string $notes Free-text design notes supplied when saving, up to 500 characters.
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?DateTime $savedAt
     */
    #[JsonProperty('savedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $savedAt;

    /**
     * @var ?string $sourceEmailId
     */
    #[JsonProperty('sourceEmailId')]
    public ?string $sourceEmailId;

    /**
     * @var ?string $sourceName
     */
    #[JsonProperty('sourceName')]
    public ?string $sourceName;

    /**
     * @var ?array<string, mixed> $theme
     */
    #[JsonProperty('theme'), ArrayType(['string' => 'mixed'])]
    public ?array $theme;

    /**
     * @var ?int $version
     */
    #[JsonProperty('version')]
    public ?int $version;

    /**
     * @param array{
     *   blocks?: ?array<array<string, mixed>>,
     *   emailPreset?: ?value-of<EmailAiStyleStateStyleEmailPreset>,
     *   fontFamily?: ?string,
     *   id?: ?string,
     *   layout?: ?EmailAiStyleStateStyleLayout,
     *   notes?: ?string,
     *   savedAt?: ?DateTime,
     *   sourceEmailId?: ?string,
     *   sourceName?: ?string,
     *   theme?: ?array<string, mixed>,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blocks = $values['blocks'] ?? null;
        $this->emailPreset = $values['emailPreset'] ?? null;
        $this->fontFamily = $values['fontFamily'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->layout = $values['layout'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->savedAt = $values['savedAt'] ?? null;
        $this->sourceEmailId = $values['sourceEmailId'] ?? null;
        $this->sourceName = $values['sourceName'] ?? null;
        $this->theme = $values['theme'] ?? null;
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
