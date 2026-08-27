<?php

namespace Sequenzy\Websites\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\Website;

class VerifySendingDomainResponse extends JsonSerializableType
{
    /**
     * @var ?bool $discarded
     */
    #[JsonProperty('discarded')]
    public ?bool $discarded;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $readyToSend Whether the domain is fully ready to send (DNS verified and activation finished).
     */
    #[JsonProperty('readyToSend')]
    public ?bool $readyToSend;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $verified Fresh DNS verification verdict. Correct DNS alone does not mean the domain can send yet.
     */
    #[JsonProperty('verified')]
    public ?bool $verified;

    /**
     * @var ?Website $website
     */
    #[JsonProperty('website')]
    public ?Website $website;

    /**
     * @param array{
     *   discarded?: ?bool,
     *   message?: ?string,
     *   readyToSend?: ?bool,
     *   success?: ?bool,
     *   verified?: ?bool,
     *   website?: ?Website,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->discarded = $values['discarded'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->readyToSend = $values['readyToSend'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->verified = $values['verified'] ?? null;
        $this->website = $values['website'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
