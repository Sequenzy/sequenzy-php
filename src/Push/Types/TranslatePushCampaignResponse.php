<?php

namespace Sequenzy\Push\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\PushTranslationResult;
use Sequenzy\Types\PushCampaign;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\PushTranslationResultFailedItem;
use Sequenzy\Types\PushTranslationResultSkippedItem;

class TranslatePushCampaignResponse extends JsonSerializableType
{
    use PushTranslationResult;

    /**
     * @var ?PushCampaign $campaign
     */
    #[JsonProperty('campaign')]
    public ?PushCampaign $campaign;

    /**
     * @param array{
     *   failed?: ?array<PushTranslationResultFailedItem>,
     *   message?: ?string,
     *   skipped?: ?array<PushTranslationResultSkippedItem>,
     *   success?: ?bool,
     *   translated?: ?array<string>,
     *   campaign?: ?PushCampaign,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->failed = $values['failed'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->translated = $values['translated'] ?? null;
        $this->campaign = $values['campaign'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
