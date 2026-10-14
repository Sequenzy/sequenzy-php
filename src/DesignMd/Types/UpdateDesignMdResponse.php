<?php

namespace Sequenzy\DesignMd\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\Types\EmailDesignSystem;
use Sequenzy\Types\DesignMdIssue;

class UpdateDesignMdResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $changes Changed fields in document terms, such as colors.primary, fonts.heading, buttons.radius, cornerRadius, logo, voice, designDirection or layout.spine.
     */
    #[JsonProperty('changes'), ArrayType(['string'])]
    public ?array $changes;

    /**
     * @var ?EmailDesignSystem $designSystem
     */
    #[JsonProperty('designSystem')]
    public ?EmailDesignSystem $designSystem;

    /**
     * @var ?bool $dryRun
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?string $markdown The document as it reads after the save, or would read for a dry run.
     */
    #[JsonProperty('markdown')]
    public ?string $markdown;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $saved True when this request wrote changes.
     */
    #[JsonProperty('saved')]
    public ?bool $saved;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $version The current version. Unchanged for a dry run or when nothing changed.
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @var ?array<DesignMdIssue> $warnings Non-blocking notes, such as ignored unknown keys, edits to the read-only Reference email section, or theme values a saved AI style overrides.
     */
    #[JsonProperty('warnings'), ArrayType([DesignMdIssue::class])]
    public ?array $warnings;

    /**
     * @param array{
     *   changes?: ?array<string>,
     *   designSystem?: ?EmailDesignSystem,
     *   dryRun?: ?bool,
     *   markdown?: ?string,
     *   message?: ?string,
     *   saved?: ?bool,
     *   success?: ?bool,
     *   version?: ?string,
     *   warnings?: ?array<DesignMdIssue>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->changes = $values['changes'] ?? null;
        $this->designSystem = $values['designSystem'] ?? null;
        $this->dryRun = $values['dryRun'] ?? null;
        $this->markdown = $values['markdown'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->saved = $values['saved'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->version = $values['version'] ?? null;
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
