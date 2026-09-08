<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageBlockBase extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?value-of<LandingPageBlockBaseSectionAlign> $sectionAlign
     */
    #[JsonProperty('sectionAlign')]
    public ?string $sectionAlign;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var ?string $sectionKind
     */
    #[JsonProperty('sectionKind')]
    public ?string $sectionKind;

    /**
     * @var ?string $sectionLabel
     */
    #[JsonProperty('sectionLabel')]
    public ?string $sectionLabel;

    /**
     * @var ?value-of<LandingPageBlockBaseSectionLayout> $sectionLayout
     */
    #[JsonProperty('sectionLayout')]
    public ?string $sectionLayout;

    /**
     * @var ?string $sectionVariant
     */
    #[JsonProperty('sectionVariant')]
    public ?string $sectionVariant;

    /**
     * @param array{
     *   id: string,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionAlign = $values['sectionAlign'] ?? null;
        $this->sectionId = $values['sectionId'] ?? null;
        $this->sectionKind = $values['sectionKind'] ?? null;
        $this->sectionLabel = $values['sectionLabel'] ?? null;
        $this->sectionLayout = $values['sectionLayout'] ?? null;
        $this->sectionVariant = $values['sectionVariant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
