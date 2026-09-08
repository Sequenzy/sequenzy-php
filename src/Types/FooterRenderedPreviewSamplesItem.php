<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\FooterApplicationItem;
use Sequenzy\Core\Json\JsonProperty;

class FooterRenderedPreviewSamplesItem extends JsonSerializableType
{
    use FooterApplicationItem;

    /**
     * @var ?string $afterHtml
     */
    #[JsonProperty('afterHtml')]
    public ?string $afterHtml;

    /**
     * @var ?string $beforeHtml
     */
    #[JsonProperty('beforeHtml')]
    public ?string $beforeHtml;

    /**
     * @param array{
     *   id: string,
     *   kind: value-of<FooterApplicationItemKind>,
     *   name: string,
     *   scope: value-of<FooterApplicationItemScope>,
     *   reason?: ?value-of<FooterApplicationItemReason>,
     *   afterHtml?: ?string,
     *   beforeHtml?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->kind = $values['kind'];
        $this->name = $values['name'];
        $this->reason = $values['reason'] ?? null;
        $this->scope = $values['scope'];
        $this->afterHtml = $values['afterHtml'] ?? null;
        $this->beforeHtml = $values['beforeHtml'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
