<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class CaptureTestimonialBlock extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $sectionId
     */
    #[JsonProperty('sectionId')]
    public ?string $sectionId;

    /**
     * @var array<CaptureTestimonial> $testimonials
     */
    #[JsonProperty('testimonials'), ArrayType([CaptureTestimonial::class])]
    public array $testimonials;

    /**
     * @param array{
     *   id: string,
     *   testimonials: array<CaptureTestimonial>,
     *   sectionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->sectionId = $values['sectionId'] ?? null;
        $this->testimonials = $values['testimonials'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
