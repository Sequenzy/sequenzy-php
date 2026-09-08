<?php

namespace Sequenzy\EmailComponents\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Types\FooterApplicationOptions;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\EmailBlock;
use Sequenzy\Core\Types\ArrayType;
use Sequenzy\EmailComponents\Types\PreviewDefaultEmailComponentsRequestSample;

class PreviewDefaultEmailComponentsRequest extends JsonSerializableType
{
    /**
     * @var FooterApplicationOptions $application
     */
    #[JsonProperty('application')]
    public FooterApplicationOptions $application;

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
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $renderPreview
     */
    #[JsonProperty('renderPreview')]
    public ?bool $renderPreview;

    /**
     * @var ?PreviewDefaultEmailComponentsRequestSample $sample
     */
    #[JsonProperty('sample')]
    public ?PreviewDefaultEmailComponentsRequestSample $sample;

    /**
     * @param array{
     *   application: FooterApplicationOptions,
     *   blocks: array<EmailBlock>,
     *   description?: ?string,
     *   name?: ?string,
     *   renderPreview?: ?bool,
     *   sample?: ?PreviewDefaultEmailComponentsRequestSample,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->application = $values['application'];
        $this->blocks = $values['blocks'];
        $this->description = $values['description'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->renderPreview = $values['renderPreview'] ?? null;
        $this->sample = $values['sample'] ?? null;
    }
}
