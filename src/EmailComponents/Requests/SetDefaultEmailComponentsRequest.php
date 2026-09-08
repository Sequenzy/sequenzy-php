<?php

namespace Sequenzy\EmailComponents\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\FooterApplicationOptions;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Types\ArrayType;

class SetDefaultEmailComponentsRequest extends JsonSerializableType
{
    /**
     * @var ?FooterApplicationOptions $application
     */
    #[JsonProperty('application')]
    public ?FooterApplicationOptions $application;

    /**
     * @var array<EmailBlock> $blocks
     */
    #[JsonProperty('blocks'), ArrayType([EmailBlock::class])]
    public array $blocks;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $name Defaults to "Default Footer" when creating the footer default.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $previewToken Required for applying a preview to existing content.
     */
    #[JsonProperty('previewToken')]
    public ?string $previewToken;

    /**
     * @param array{
     *   blocks: array<EmailBlock>,
     *   application?: ?FooterApplicationOptions,
     *   description?: ?string,
     *   name?: ?string,
     *   previewToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->application = $values['application'] ?? null;
        $this->blocks = $values['blocks'];
        $this->description = $values['description'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->previewToken = $values['previewToken'] ?? null;
    }
}
