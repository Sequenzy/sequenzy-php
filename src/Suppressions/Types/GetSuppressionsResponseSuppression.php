<?php

namespace Sequenzy\Suppressions\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class GetSuppressionsResponseSuppression extends JsonSerializableType
{
    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?bool $knownRecipient
     */
    #[JsonProperty('knownRecipient')]
    public ?bool $knownRecipient;

    /**
     * @var ?GetSuppressionsResponseSuppressionLocal $local
     */
    #[JsonProperty('local')]
    public ?GetSuppressionsResponseSuppressionLocal $local;

    /**
     * @var ?GetSuppressionsResponseSuppressionSes $ses
     */
    #[JsonProperty('ses')]
    public ?GetSuppressionsResponseSuppressionSes $ses;

    /**
     * @var ?bool $suppressed
     */
    #[JsonProperty('suppressed')]
    public ?bool $suppressed;

    /**
     * @param array{
     *   email?: ?string,
     *   knownRecipient?: ?bool,
     *   local?: ?GetSuppressionsResponseSuppressionLocal,
     *   ses?: ?GetSuppressionsResponseSuppressionSes,
     *   suppressed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->knownRecipient = $values['knownRecipient'] ?? null;
        $this->local = $values['local'] ?? null;
        $this->ses = $values['ses'] ?? null;
        $this->suppressed = $values['suppressed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
