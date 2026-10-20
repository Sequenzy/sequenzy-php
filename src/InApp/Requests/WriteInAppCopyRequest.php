<?php

namespace Sequenzy\InApp\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\InApp\Types\WriteInAppCopyRequestFormat;
use Sequenzy\InApp\Types\WriteInAppCopyRequestKind;

class WriteInAppCopyRequest extends JsonSerializableType
{
    /**
     * @var string $brief
     */
    #[JsonProperty('brief')]
    public string $brief;

    /**
     * @var ?value-of<WriteInAppCopyRequestFormat> $format
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?bool $hasImage
     */
    #[JsonProperty('hasImage')]
    public ?bool $hasImage;

    /**
     * @var ?value-of<WriteInAppCopyRequestKind> $kind
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @param array{
     *   brief: string,
     *   format?: ?value-of<WriteInAppCopyRequestFormat>,
     *   hasImage?: ?bool,
     *   kind?: ?value-of<WriteInAppCopyRequestKind>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->brief = $values['brief'];
        $this->format = $values['format'] ?? null;
        $this->hasImage = $values['hasImage'] ?? null;
        $this->kind = $values['kind'] ?? null;
    }
}
