<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\PushLocalization;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Push\Types\UpdatePushCampaignRequestPlatformsItem;

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
     * @var ?array<PushLocalization> $localizations
     */
    #[JsonProperty('localizations'), ArrayType([PushLocalization::class])]
    public ?array $localizations;

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
     * @var ?string $scheduledTimezone IANA timezone the scheduled wall-clock time refers to, for example America/New_York. null clears it.
     */
    #[JsonProperty('scheduledTimezone')]
    public ?string $scheduledTimezone;

    /**
     * @var ?bool $sendInRecipientTimezone Deliver scheduledAt's wall-clock time in each contact's own timezone, using the timezone the contact's most recently seen active device reported, else the contact's timezone attribute. Needs scheduledAt and scheduledTimezone when sending. Contacts whose local time has already passed get the push right away; contacts with no known timezone get it at scheduledAt. Delivery starts where the wall time first occurs (UTC+14), so a campaign can stay sending for about 26 hours. Enabling it turns sendTimeOptimization off; omit to keep the saved value.
     */
    #[JsonProperty('sendInRecipientTimezone')]
    public ?bool $sendInRecipientTimezone;

    /**
     * @var ?bool $sendTimeOptimization Send each contact the push at their most engaged UTC hour within sendTimeWindowHours of the start (now, or scheduledAt). The hour is their most-clicked push hour over the last 90 days (at least 3 clicks), else their most-opened email hour, else the workspace's most-clicked push hour (once it has at least 20 clicks in the last 90 days), else the start. Enabling it turns sendInRecipientTimezone off; passing both as true returns 400. Omit to keep the saved value.
     */
    #[JsonProperty('sendTimeOptimization')]
    public ?bool $sendTimeOptimization;

    /**
     * @var ?int $sendTimeWindowHours Hours after the start in which optimized sends may land. Omit to keep the saved value, which is 12 if never set.
     */
    #[JsonProperty('sendTimeWindowHours')]
    public ?int $sendTimeWindowHours;

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
     *   localizations?: ?array<PushLocalization>,
     *   name?: ?string,
     *   platforms?: ?array<value-of<UpdatePushCampaignRequestPlatformsItem>>,
     *   scheduledTimezone?: ?string,
     *   sendInRecipientTimezone?: ?bool,
     *   sendTimeOptimization?: ?bool,
     *   sendTimeWindowHours?: ?int,
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
        $this->localizations = $values['localizations'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->platforms = $values['platforms'] ?? null;
        $this->scheduledTimezone = $values['scheduledTimezone'] ?? null;
        $this->sendInRecipientTimezone = $values['sendInRecipientTimezone'] ?? null;
        $this->sendTimeOptimization = $values['sendTimeOptimization'] ?? null;
        $this->sendTimeWindowHours = $values['sendTimeWindowHours'] ?? null;
        $this->targetLists = $values['targetLists'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->url = $values['url'] ?? null;
    }
}
