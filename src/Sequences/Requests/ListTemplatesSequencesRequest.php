<?php

namespace Sequenzy\Sequences\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Sequences\Types\ListTemplatesSequencesRequestWebsiteType;

class ListTemplatesSequencesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListTemplatesSequencesRequestWebsiteType> $websiteType `company` uses the company's own category, `all` lists every template. Other values return 400.
     */
    public ?string $websiteType;

    /**
     * @param array{
     *   websiteType?: ?value-of<ListTemplatesSequencesRequestWebsiteType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->websiteType = $values['websiteType'] ?? null;
    }
}
