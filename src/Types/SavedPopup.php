<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use DateTime;
use Sequenzy\Core\Types\Date;

/**
 * A saved on-site signup popup.
 */
class SavedPopup extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $content Complete popup content - template, presentation, placement, theme, settings, trigger, targeting, schedule, frequency, visual, and blocks. Present on detail reads; omitted when listing unless `includeContent=true`.
     */
    #[JsonProperty('content'), ArrayType(['string' => 'mixed'])]
    public ?array $content;

    /**
     * @var ?int $conversionCount Times a visitor submitted the popup and became a subscriber.
     */
    #[JsonProperty('conversionCount')]
    public ?int $conversionCount;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?DateTime $publishedAt
     */
    #[JsonProperty('publishedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var ?int $startCount Times a visitor began filling the popup in. Always between viewCount and conversionCount.
     */
    #[JsonProperty('startCount')]
    public ?int $startCount;

    /**
     * @var ?SavedPopupStats $stats
     */
    #[JsonProperty('stats')]
    public ?SavedPopupStats $stats;

    /**
     * @var ?value-of<SavedPopupStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?string $url Dashboard URL for this popup.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?int $viewCount Times the popup was shown to a visitor.
     */
    #[JsonProperty('viewCount')]
    public ?int $viewCount;

    /**
     * @param array{
     *   content?: ?array<string, mixed>,
     *   conversionCount?: ?int,
     *   createdAt?: ?DateTime,
     *   id?: ?string,
     *   name?: ?string,
     *   publishedAt?: ?DateTime,
     *   startCount?: ?int,
     *   stats?: ?SavedPopupStats,
     *   status?: ?value-of<SavedPopupStatus>,
     *   updatedAt?: ?DateTime,
     *   url?: ?string,
     *   viewCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->content = $values['content'] ?? null;
        $this->conversionCount = $values['conversionCount'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->startCount = $values['startCount'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->viewCount = $values['viewCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
