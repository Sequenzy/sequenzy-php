<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Push\Types\UpdatePushCampaignRequestPlatformsItem;
use Sequenzy\Core\Types\ArrayType;

class UpdatePushCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?string $body Notification message. Merge tags are supported.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?string $iconUrl Optional https icon for web push. Defaults to the workspace icon.
     */
    #[JsonProperty('iconUrl')]
    public ?string $iconUrl;

    /**
     * @var ?string $imageUrl Optional https image shown in the notification.
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<value-of<UpdatePushCampaignRequestPlatformsItem>> $platforms Limit delivery to these platforms. Omit or pass an empty array for every platform.
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var ?array<string, mixed> $targetLists Audience, same shape as campaign targetLists.
     */
    #[JsonProperty('targetLists'), ArrayType(['string' => 'mixed'])]
    public ?array $targetLists;

    /**
     * @var ?string $title Notification title. Merge tags such as {{FIRST_NAME|there}} are supported.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $url Link opened on tap. An https URL, an app deep link (myapp://...), or a merge tag. Browsers only open https links. null clears it.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   body?: ?string,
     *   iconUrl?: ?string,
     *   imageUrl?: ?string,
     *   name?: ?string,
     *   platforms?: ?array<value-of<UpdatePushCampaignRequestPlatformsItem>>,
     *   targetLists?: ?array<string, mixed>,
     *   title?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->iconUrl = $values['iconUrl'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
