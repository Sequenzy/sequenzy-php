<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * Brand-derived. Send back the value a theme read returned so a copied theme renders the same; null removes it.
 */
class EmailThemePatchRadiiFromBrand extends JsonSerializableType
{
    /**
     * @var bool $base
     */
    #[JsonProperty('base')]
    public bool $base;

    /**
     * @var bool $button
     */
    #[JsonProperty('button')]
    public bool $button;

    /**
     * @param array{
     *   base: bool,
     *   button: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->base = $values['base'];
        $this->button = $values['button'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
