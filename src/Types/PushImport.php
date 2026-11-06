<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use DateTime;
use Sequenzy\Core\Types\Date;
use Sequenzy\Core\Types\ArrayType;

/**
 * A push subscription import. Never includes the source API key or the staged devices.
 */
class PushImport extends JsonSerializableType
{
    /**
     * @var ?bool $canResume True for failed or stalled imports; POST start resumes from the last checkpoint.
     */
    #[JsonProperty('canResume')]
    public ?bool $canResume;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?array<string, mixed> $config Source settings (app ID, REST endpoint, segment, region), platforms, importAttributes and appIds. Never the API key.
     */
    #[JsonProperty('config'), ArrayType(['string' => 'mixed'])]
    public ?array $config;

    /**
     * @var ?PushImportCounts $counts
     */
    #[JsonProperty('counts')]
    public ?PushImportCounts $counts;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?array<string, int> $invalidReasons Counts by reason: unknown_platform, invalid_token, ios_token_not_apns, firebase_installation_id.
     */
    #[JsonProperty('invalidReasons'), ArrayType(['string' => 'integer'])]
    public ?array $invalidReasons;

    /**
     * @var ?PushImportProgress $progress
     */
    #[JsonProperty('progress')]
    public ?PushImportProgress $progress;

    /**
     * @var ?array<string, int> $skippedReasons Counts by reason: web_push_not_portable, unsupported_platform, not_push_subscription, platform_not_selected, other_app, no_contact_identity, contact_not_found (only on imports run before push-only contacts were supported), identity_conflict (the email belongs to a contact with another external ID), contact_not_created, contact_deleted (the contact was deleted while the import ran), duplicate_token.
     */
    #[JsonProperty('skippedReasons'), ArrayType(['string' => 'integer'])]
    public ?array $skippedReasons;

    /**
     * @var ?value-of<PushImportSource> $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?string $sourceLabel
     */
    #[JsonProperty('sourceLabel')]
    public ?string $sourceLabel;

    /**
     * @var ?bool $stalled True when a running import has not reported progress for 15 minutes.
     */
    #[JsonProperty('stalled')]
    public ?bool $stalled;

    /**
     * @var ?DateTime $startedAt
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?value-of<PushImportStatus> $status draft until started; exporting while devices are read from the source; importing while they are written.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?array<PushImportWarning> $warnings
     */
    #[JsonProperty('warnings'), ArrayType([PushImportWarning::class])]
    public ?array $warnings;

    /**
     * @param array{
     *   canResume?: ?bool,
     *   completedAt?: ?DateTime,
     *   config?: ?array<string, mixed>,
     *   counts?: ?PushImportCounts,
     *   createdAt?: ?DateTime,
     *   error?: ?string,
     *   id?: ?string,
     *   invalidReasons?: ?array<string, int>,
     *   progress?: ?PushImportProgress,
     *   skippedReasons?: ?array<string, int>,
     *   source?: ?value-of<PushImportSource>,
     *   sourceLabel?: ?string,
     *   stalled?: ?bool,
     *   startedAt?: ?DateTime,
     *   status?: ?value-of<PushImportStatus>,
     *   updatedAt?: ?DateTime,
     *   warnings?: ?array<PushImportWarning>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->canResume = $values['canResume'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->config = $values['config'] ?? null;
        $this->counts = $values['counts'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->error = $values['error'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->invalidReasons = $values['invalidReasons'] ?? null;
        $this->progress = $values['progress'] ?? null;
        $this->skippedReasons = $values['skippedReasons'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->sourceLabel = $values['sourceLabel'] ?? null;
        $this->stalled = $values['stalled'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
