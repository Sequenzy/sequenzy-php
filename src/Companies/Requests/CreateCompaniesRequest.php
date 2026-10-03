<?php

namespace Sequenzy\Companies\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class CreateCompaniesRequest extends JsonSerializableType
{
    /**
     * @var ?string $description Optional business description used as context for welcome-sequence generation. Without a website, a non-null value that is not a string of up to 500 characters returns 400; with a domain it is ignored, and website processing may replace the stored description.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $domain Company website domain or URL. Required unless noWebsite is true. When both are sent, the domain is used.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $name Company display name. If omitted, Sequenzy derives it from the domain.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $noWebsite Create a ready workspace without a website. Requires name when no domain is sent. Ignored when a non-blank domain is sent.
     */
    #[JsonProperty('noWebsite')]
    public ?bool $noWebsite;

    /**
     * @var ?bool $withWelcomeSequence Set true to create a draft four-email welcome sequence and queue its generation. Defaults to false; any other value is treated as false.
     */
    #[JsonProperty('withWelcomeSequence')]
    public ?bool $withWelcomeSequence;

    /**
     * @param array{
     *   description?: ?string,
     *   domain?: ?string,
     *   name?: ?string,
     *   noWebsite?: ?bool,
     *   withWelcomeSequence?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->description = $values['description'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->noWebsite = $values['noWebsite'] ?? null;
        $this->withWelcomeSequence = $values['withWelcomeSequence'] ?? null;
    }
}
