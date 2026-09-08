<?php

namespace Sequenzy\EmailComponents\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class PreviewDefaultEmailComponentsRequestSample extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<PreviewDefaultEmailComponentsRequestSampleKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @param array{
     *   id: string,
     *   kind: value-of<PreviewDefaultEmailComponentsRequestSampleKind>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->kind = $values['kind'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
