<?php

namespace Sequenzy\EmailDesignSystem\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\EmailDesignSystem\Types\UpdateEmailDesignSystemRequestCompositionSpine;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\EmailDesignSystem\Types\UpdateEmailDesignSystemRequestDesignCode;

class UpdateEmailDesignSystemRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateEmailDesignSystemRequestCompositionSpine> $compositionSpine Which worked-example skeleton anchors generation.
     */
    #[JsonProperty('compositionSpine')]
    public ?string $compositionSpine;

    /**
     * @var ?UpdateEmailDesignSystemRequestDesignCode $designCode Partial visual-grammar adjustment; omitted tokens keep their current value.
     */
    #[JsonProperty('designCode')]
    public ?UpdateEmailDesignSystemRequestDesignCode $designCode;

    /**
     * @var ?bool $reset true clears the direction text and returns to brand-derived defaults. Cannot be combined with designCode or compositionSpine.
     */
    #[JsonProperty('reset')]
    public ?bool $reset;

    /**
     * @param array{
     *   compositionSpine?: ?value-of<UpdateEmailDesignSystemRequestCompositionSpine>,
     *   designCode?: ?UpdateEmailDesignSystemRequestDesignCode,
     *   reset?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->compositionSpine = $values['compositionSpine'] ?? null;
        $this->designCode = $values['designCode'] ?? null;
        $this->reset = $values['reset'] ?? null;
    }
}
