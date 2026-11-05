<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateFromTemplateSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?string $name Sequence name. Defaults to the template name.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var string $templateId Template id, such as `mobile-trial-conversion`.
     */
    #[JsonProperty('templateId')]
    public string $templateId;

    /**
     * @param array{
     *   templateId: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->templateId = $values['templateId'];
    }
}
