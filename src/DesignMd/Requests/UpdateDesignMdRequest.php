<?php

namespace Sequenzy\DesignMd\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class UpdateDesignMdRequest extends JsonSerializableType
{
    /**
     * @var ?bool $dryRun true validates the document and reports changes and warnings without saving.
     */
    #[JsonProperty('dryRun')]
    public ?bool $dryRun;

    /**
     * @var ?string $expectedVersion Version from GET /design-md. When it no longer matches, the save fails with 409 and nothing is written. Recommended.
     */
    #[JsonProperty('expectedVersion')]
    public ?string $expectedVersion;

    /**
     * @var string $markdown The full design.md document, usually the markdown from GET /design-md with your edits.
     */
    #[JsonProperty('markdown')]
    public string $markdown;

    /**
     * @param array{
     *   markdown: string,
     *   dryRun?: ?bool,
     *   expectedVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dryRun = $values['dryRun'] ?? null;
        $this->expectedVersion = $values['expectedVersion'] ?? null;
        $this->markdown = $values['markdown'];
    }
}
