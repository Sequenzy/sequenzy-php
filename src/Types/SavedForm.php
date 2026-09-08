<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;

class SavedForm extends JsonSerializableType
{
    /**
     * @var string $actionUrl
     */
    #[JsonProperty('actionUrl')]
    public string $actionUrl;

    /**
     * @var SavedFormContent $content
     */
    #[JsonProperty('content')]
    public SavedFormContent $content;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?DateTime $publishedAt Publication timestamp; unpublishing may preserve it. Use status to determine whether the form is currently published.
     */
    #[JsonProperty('publishedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $publishedAt;

    /**
     * @var SavedFormSettings $settings
     */
    #[JsonProperty('settings')]
    public SavedFormSettings $settings;

    /**
     * @var value-of<SavedFormStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $submissionCount
     */
    #[JsonProperty('submissionCount')]
    public int $submissionCount;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $url Dashboard URL for this form.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   actionUrl: string,
     *   content: SavedFormContent,
     *   createdAt: DateTime,
     *   id: string,
     *   name: string,
     *   settings: SavedFormSettings,
     *   status: value-of<SavedFormStatus>,
     *   submissionCount: int,
     *   updatedAt: DateTime,
     *   url: string,
     *   publishedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->actionUrl = $values['actionUrl'];
        $this->content = $values['content'];
        $this->createdAt = $values['createdAt'];
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->publishedAt = $values['publishedAt'] ?? null;
        $this->settings = $values['settings'];
        $this->status = $values['status'];
        $this->submissionCount = $values['submissionCount'];
        $this->updatedAt = $values['updatedAt'];
        $this->url = $values['url'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
