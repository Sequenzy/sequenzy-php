<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

/**
 * The visual identity every AI-generated email renders inside, parsed from the company's design direction text.
 */
class EmailDesignSystem extends JsonSerializableType
{
    /**
     * @var value-of<EmailDesignSystemCompositionSpine> $compositionSpine Which worked-example skeleton anchors email composition.
     */
    #[JsonProperty('compositionSpine')]
    public string $compositionSpine;

    /**
     * @var EmailDesignSystemDesignCode $designCode The locked visual grammar applied to every generated email.
     */
    #[JsonProperty('designCode')]
    public EmailDesignSystemDesignCode $designCode;

    /**
     * @var value-of<EmailDesignSystemSource> $source derived when every token comes from brand derivation; custom when the direction text carries the identity.
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var int $version
     */
    #[JsonProperty('version')]
    public int $version;

    /**
     * @param array{
     *   compositionSpine: value-of<EmailDesignSystemCompositionSpine>,
     *   designCode: EmailDesignSystemDesignCode,
     *   source: value-of<EmailDesignSystemSource>,
     *   version: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->compositionSpine = $values['compositionSpine'];
        $this->designCode = $values['designCode'];
        $this->source = $values['source'];
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
