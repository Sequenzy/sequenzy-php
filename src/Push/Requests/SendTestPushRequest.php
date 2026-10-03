<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Push\Types\SendTestPushRequestPlatformsItem;
use Sequenzy\Core\Types\ArrayType;

class SendTestPushRequest extends JsonSerializableType
{
    /**
     * @var ?string $body Notification message. Merge tags are supported.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @var ?string $deviceId One device to notify.
     */
    #[JsonProperty('deviceId')]
    public ?string $deviceId;

    /**
     * @var ?string $email Notify every active device of this contact.
     */
    #[JsonProperty('email')]
    public ?string $email;

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
     * @var ?array<value-of<SendTestPushRequestPlatformsItem>> $platforms Limit delivery to these platforms. Omit or pass an empty array for every platform.
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var ?string $subscriberId Notify every active device of this subscriber.
     */
    #[JsonProperty('subscriberId')]
    public ?string $subscriberId;

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
     *   deviceId?: ?string,
     *   email?: ?string,
     *   iconUrl?: ?string,
     *   imageUrl?: ?string,
     *   platforms?: ?array<value-of<SendTestPushRequestPlatformsItem>>,
     *   subscriberId?: ?string,
     *   title?: ?string,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->body = $values['body'] ?? null;
        $this->deviceId = $values['deviceId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->iconUrl = $values['iconUrl'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
        $this->subscriberId = $values['subscriberId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
