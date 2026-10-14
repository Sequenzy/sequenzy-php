<?php

namespace Sequenzy\DesignMd\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\EmailDesignSystem;
use Sequenzy\Core\Json\JsonProperty;

class GetDesignMdResponse extends JsonSerializableType
{
    /**
     * @var ?EmailDesignSystem $designSystem
     */
    #[JsonProperty('designSystem')]
    public ?EmailDesignSystem $designSystem;

    /**
     * @var ?string $markdown The full design.md document.
     */
    #[JsonProperty('markdown')]
    public ?string $markdown;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?string $version Content version. Pass it as expectedVersion when saving so a concurrent change fails instead of being overwritten.
     */
    #[JsonProperty('version')]
    public ?string $version;

    /**
     * @param array{
     *   designSystem?: ?EmailDesignSystem,
     *   markdown?: ?string,
     *   success?: ?bool,
     *   version?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->designSystem = $values['designSystem'] ?? null;
        $this->markdown = $values['markdown'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->version = $values['version'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
