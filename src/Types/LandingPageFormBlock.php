<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\LandingPageBlockBase;
use Sequenzy\Core\Json\JsonProperty;

class LandingPageFormBlock extends JsonSerializableType
{
    use LandingPageBlockBase;

    /**
     * @var ?int $cardTilt
     */
    #[JsonProperty('cardTilt')]
    public ?int $cardTilt;

    /**
     * @var ?value-of<LandingPageFormBlockCardWidth> $cardWidth
     */
    #[JsonProperty('cardWidth')]
    public ?string $cardWidth;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?LandingPageFormConfig $form
     */
    #[JsonProperty('form')]
    public ?LandingPageFormConfig $form;

    /**
     * @var ?string $heading
     */
    #[JsonProperty('heading')]
    public ?string $heading;

    /**
     * @var value-of<LandingPageFormBlockSlot> $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @param array{
     *   id: string,
     *   slot: value-of<LandingPageFormBlockSlot>,
     *   sectionAlign?: ?value-of<LandingPageBlockBaseSectionAlign>,
     *   sectionId?: ?string,
     *   sectionKind?: ?string,
     *   sectionLabel?: ?string,
     *   sectionLayout?: ?value-of<LandingPageBlockBaseSectionLayout>,
     *   sectionVariant?: ?string,
     *   cardTilt?: ?int,
     *   cardWidth?: ?value-of<LandingPageFormBlockCardWidth>,
     *   description?: ?string,
     *   form?: ?LandingPageFormConfig,
     *   heading?: ?string,
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
        $this->cardTilt = $values['cardTilt'] ?? null;
        $this->cardWidth = $values['cardWidth'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->form = $values['form'] ?? null;
        $this->heading = $values['heading'] ?? null;
        $this->slot = $values['slot'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
