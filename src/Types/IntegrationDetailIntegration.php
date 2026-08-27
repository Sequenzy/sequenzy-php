<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

class IntegrationDetailIntegration extends JsonSerializableType
{
    /**
     * @var ?value-of<IntegrationDetailIntegrationCategory> $category Provider category, or null for a provider with no catalog entry.
     */
    #[JsonProperty('category')]
    public ?string $category;

    /**
     * @var ?DateTime $connectedAt
     */
    #[JsonProperty('connectedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $connectedAt;

    /**
     * @var ?array<string, mixed> $details Allowlisted non-secret metadata. Never contains credentials.
     */
    #[JsonProperty('details'), ArrayType(['string' => 'mixed'])]
    public ?array $details;

    /**
     * @var ?DateTime $disconnectedAt
     */
    #[JsonProperty('disconnectedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $disconnectedAt;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('isActive')]
    public ?bool $isActive;

    /**
     * @var ?DateTime $lastSyncAt
     */
    #[JsonProperty('lastSyncAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncAt;

    /**
     * @var ?string $lastSyncError
     */
    #[JsonProperty('lastSyncError')]
    public ?string $lastSyncError;

    /**
     * @var ?IntegrationSyncSkipSummary $lastSyncSkipped Records the last sync could not import normally. Null when the sync was clean or the provider does not report skips.
     */
    #[JsonProperty('lastSyncSkipped')]
    public ?IntegrationSyncSkipSummary $lastSyncSkipped;

    /**
     * @var ?string $name Provider display name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $providerAccountId Provider-side account identifier, such as a Shopify shop domain or Stripe acct_ ID.
     */
    #[JsonProperty('providerAccountId')]
    public ?string $providerAccountId;

    /**
     * @var ?bool $syncEnabled
     */
    #[JsonProperty('syncEnabled')]
    public ?bool $syncEnabled;

    /**
     * @var ?string $syncStatus
     */
    #[JsonProperty('syncStatus')]
    public ?string $syncStatus;

    /**
     * @var ?int $totalCustomersSynced
     */
    #[JsonProperty('totalCustomersSynced')]
    public ?int $totalCustomersSynced;

    /**
     * @var ?int $totalEventsSynced
     */
    #[JsonProperty('totalEventsSynced')]
    public ?int $totalEventsSynced;

    /**
     * @param array{
     *   category?: ?value-of<IntegrationDetailIntegrationCategory>,
     *   connectedAt?: ?DateTime,
     *   details?: ?array<string, mixed>,
     *   disconnectedAt?: ?DateTime,
     *   id?: ?string,
     *   isActive?: ?bool,
     *   lastSyncAt?: ?DateTime,
     *   lastSyncError?: ?string,
     *   lastSyncSkipped?: ?IntegrationSyncSkipSummary,
     *   name?: ?string,
     *   provider?: ?string,
     *   providerAccountId?: ?string,
     *   syncEnabled?: ?bool,
     *   syncStatus?: ?string,
     *   totalCustomersSynced?: ?int,
     *   totalEventsSynced?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->category = $values['category'] ?? null;
        $this->connectedAt = $values['connectedAt'] ?? null;
        $this->details = $values['details'] ?? null;
        $this->disconnectedAt = $values['disconnectedAt'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->lastSyncAt = $values['lastSyncAt'] ?? null;
        $this->lastSyncError = $values['lastSyncError'] ?? null;
        $this->lastSyncSkipped = $values['lastSyncSkipped'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->providerAccountId = $values['providerAccountId'] ?? null;
        $this->syncEnabled = $values['syncEnabled'] ?? null;
        $this->syncStatus = $values['syncStatus'] ?? null;
        $this->totalCustomersSynced = $values['totalCustomersSynced'] ?? null;
        $this->totalEventsSynced = $values['totalEventsSynced'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
