<?php

namespace Sequenzy\Subscribers\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Types\SubscriberImport;

class CreateImportSubscribersResponse extends JsonSerializableType
{
    /**
     * @var ?bool $deduplicated
     */
    #[JsonProperty('deduplicated')]
    public ?bool $deduplicated;

    /**
     * @var ?SubscriberImport $import
     */
    #[JsonProperty('import')]
    public ?SubscriberImport $import;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $success
     */
    #[JsonProperty('success')]
    public ?bool $success;

    /**
     * @param array{
     *   deduplicated?: ?bool,
     *   import?: ?SubscriberImport,
     *   message?: ?string,
     *   success?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deduplicated = $values['deduplicated'] ?? null;
        $this->import = $values['import'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->success = $values['success'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
