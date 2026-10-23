<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\Error;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Core\Types\ArrayType;

class BadRequestErrorBody extends JsonSerializableType
{
    use Error;

    /**
     * @var ?array<BadRequestErrorBodyPublicationsItem> $publications SparkLoop only, with code sparkloop_publication_required. The publications to pass as providerAccountId.
     */
    #[JsonProperty('publications'), ArrayType([BadRequestErrorBodyPublicationsItem::class])]
    public ?array $publications;

    /**
     * @param array{
     *   error: string,
     *   code?: ?string,
     *   issues?: ?array<InputIssue>,
     *   retryable?: ?bool,
     *   success?: ?bool,
     *   publications?: ?array<BadRequestErrorBodyPublicationsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'] ?? null;
        $this->error = $values['error'];
        $this->issues = $values['issues'] ?? null;
        $this->retryable = $values['retryable'] ?? null;
        $this->success = $values['success'] ?? null;
        $this->publications = $values['publications'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
