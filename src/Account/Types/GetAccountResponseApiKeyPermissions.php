<?php

namespace Sequenzy\Account\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

/**
 * Read-only identity and permission metadata for the authenticated key, including a recovery URL. This does not bypass resource scopes.
 */
class GetAccountResponseApiKeyPermissions extends JsonSerializableType
{
    /**
     * @var ?GetAccountResponseApiKeyPermissionsActiveKey $activeKey Non-secret identity of the bearer key that authenticated this request. Use it to verify that a restarted client loaded the intended replacement key.
     */
    #[JsonProperty('activeKey')]
    public ?GetAccountResponseApiKeyPermissionsActiveKey $activeKey;

    /**
     * @var ?bool $canDiscoverMarketingWork Whether the key can read campaigns, sequences, and landing pages.
     */
    #[JsonProperty('canDiscoverMarketingWork')]
    public ?bool $canDiscoverMarketingWork;

    /**
     * @var ?bool $canSendLive Whether the key holds any scope that delivers to a real person. False for drafting-only keys, which can create and update content but cannot send it.
     */
    #[JsonProperty('canSendLive')]
    public ?bool $canSendLive;

    /**
     * @var ?int $currentScopeCount Total number of permission scopes defined when the response was generated.
     */
    #[JsonProperty('currentScopeCount')]
    public ?int $currentScopeCount;

    /**
     * @var ?string $description Human-readable explanation of the effective permission selection.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $fullAccess
     */
    #[JsonProperty('fullAccess')]
    public ?bool $fullAccess;

    /**
     * @var ?bool $liveDeliveryBlockedByRole Whether the authenticated user's role in the selected workspace blocks sending regardless of key scopes. Personal keys held by a viewer are read-only, so widening the key's permissions does not enable delivery; the role has to change.
     */
    #[JsonProperty('liveDeliveryBlockedByRole')]
    public ?bool $liveDeliveryBlockedByRole;

    /**
     * @var ?string $manageUrl Direct management URL for the authenticated key. Personal keys open Account API Keys; company keys open the selected workspace's API Keys settings.
     */
    #[JsonProperty('manageUrl')]
    public ?string $manageUrl;

    /**
     * @var ?array<string> $missingLiveDeliveryScopes Live-delivery scopes the key does not hold, such as transactional:send for one-to-one sends or campaigns:send for campaigns. Drafting permission such as transactional:write does not imply delivery.
     */
    #[JsonProperty('missingLiveDeliveryScopes'), ArrayType(['string'])]
    public ?array $missingLiveDeliveryScopes;

    /**
     * @var ?array<string> $missingMarketingReadScopes
     */
    #[JsonProperty('missingMarketingReadScopes'), ArrayType(['string'])]
    public ?array $missingMarketingReadScopes;

    /**
     * @var ?value-of<GetAccountResponseApiKeyPermissionsPreset> $preset
     */
    #[JsonProperty('preset')]
    public ?string $preset;

    /**
     * @var ?array<string> $scopes
     */
    #[JsonProperty('scopes'), ArrayType(['string'])]
    public ?array $scopes;

    /**
     * @var ?int $selectedScopeCount Number of currently defined scopes enabled for the key. For full-access keys this equals currentScopeCount, while fullAccess still indicates future-scope access.
     */
    #[JsonProperty('selectedScopeCount')]
    public ?int $selectedScopeCount;

    /**
     * @param array{
     *   activeKey?: ?GetAccountResponseApiKeyPermissionsActiveKey,
     *   canDiscoverMarketingWork?: ?bool,
     *   canSendLive?: ?bool,
     *   currentScopeCount?: ?int,
     *   description?: ?string,
     *   fullAccess?: ?bool,
     *   liveDeliveryBlockedByRole?: ?bool,
     *   manageUrl?: ?string,
     *   missingLiveDeliveryScopes?: ?array<string>,
     *   missingMarketingReadScopes?: ?array<string>,
     *   preset?: ?value-of<GetAccountResponseApiKeyPermissionsPreset>,
     *   scopes?: ?array<string>,
     *   selectedScopeCount?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->activeKey = $values['activeKey'] ?? null;
        $this->canDiscoverMarketingWork = $values['canDiscoverMarketingWork'] ?? null;
        $this->canSendLive = $values['canSendLive'] ?? null;
        $this->currentScopeCount = $values['currentScopeCount'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->fullAccess = $values['fullAccess'] ?? null;
        $this->liveDeliveryBlockedByRole = $values['liveDeliveryBlockedByRole'] ?? null;
        $this->manageUrl = $values['manageUrl'] ?? null;
        $this->missingLiveDeliveryScopes = $values['missingLiveDeliveryScopes'] ?? null;
        $this->missingMarketingReadScopes = $values['missingMarketingReadScopes'] ?? null;
        $this->preset = $values['preset'] ?? null;
        $this->scopes = $values['scopes'] ?? null;
        $this->selectedScopeCount = $values['selectedScopeCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
