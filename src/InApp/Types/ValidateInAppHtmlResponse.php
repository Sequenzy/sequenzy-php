<?php

namespace Sequenzy\InApp\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class ValidateInAppHtmlResponse extends JsonSerializableType
{
    /**
     * @var ?int $bytes UTF-8 size after Braze Liquid conversion.
     */
    #[JsonProperty('bytes')]
    public ?int $bytes;

    /**
     * @var ?bool $closesItself
     */
    #[JsonProperty('closesItself')]
    public ?bool $closesItself;

    /**
     * @var ?array<ValidateInAppHtmlResponseConversionsItem> $conversions
     */
    #[JsonProperty('conversions'), ArrayType([ValidateInAppHtmlResponseConversionsItem::class])]
    public ?array $conversions;

    /**
     * @var ?array<string> $errors
     */
    #[JsonProperty('errors'), ArrayType(['string'])]
    public ?array $errors;

    /**
     * @var ?int $maxBytes
     */
    #[JsonProperty('maxBytes')]
    public ?int $maxBytes;

    /**
     * @var ?array<string> $scriptHosts
     */
    #[JsonProperty('scriptHosts'), ArrayType(['string'])]
    public ?array $scriptHosts;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @var ?bool $valid True when the document can be saved.
     */
    #[JsonProperty('valid')]
    public ?bool $valid;

    /**
     * @var ?array<ValidateInAppHtmlResponseWarningsItem> $warnings
     */
    #[JsonProperty('warnings'), ArrayType([ValidateInAppHtmlResponseWarningsItem::class])]
    public ?array $warnings;

    /**
     * @param array{
     *   bytes?: ?int,
     *   closesItself?: ?bool,
     *   conversions?: ?array<ValidateInAppHtmlResponseConversionsItem>,
     *   errors?: ?array<string>,
     *   maxBytes?: ?int,
     *   scriptHosts?: ?array<string>,
     *   success?: ?bool,
     *   valid?: ?bool,
     *   warnings?: ?array<ValidateInAppHtmlResponseWarningsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bytes = $values['bytes'] ?? null;
        $this->closesItself = $values['closesItself'] ?? null;
        $this->conversions = $values['conversions'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->maxBytes = $values['maxBytes'] ?? null;
        $this->scriptHosts = $values['scriptHosts'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->valid = $values['valid'] ?? null;
        $this->warnings = $values['warnings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
