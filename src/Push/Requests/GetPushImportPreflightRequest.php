<?php

namespace Sequenzy\Push\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Push\Types\GetPushImportPreflightRequestSource;

class GetPushImportPreflightRequest extends JsonSerializableType
{
    /**
     * @var ?string $platforms Comma-separated ios,android (default both). Unknown values return 400.
     */
    public ?string $platforms;

    /**
     * @var value-of<GetPushImportPreflightRequestSource> $source
     */
    public string $source;

    /**
     * @param array{
     *   source: value-of<GetPushImportPreflightRequestSource>,
     *   platforms?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platforms = $values['platforms'] ?? null;
        $this->source = $values['source'];
    }
}
