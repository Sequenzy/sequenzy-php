<?php

namespace Sequenzy\References\Requests;

use Sequenzy\Core\Json\JsonSerializableType;

class ListGalleryWatchlistEmailsRequest extends JsonSerializableType
{
    /**
     * @var ?string $cursor `nextCursor` from the previous page, for older emails.
     */
    public ?string $cursor;

    /**
     * @var ?string $domain Only this watched brand, by website or domain, such as `linear.app`.
     */
    public ?string $domain;

    /**
     * @var ?int $limit Emails per page.
     */
    public ?int $limit;

    /**
     * @var ?string $since Only emails sent at or after this ISO 8601 date or time, such as `2026-10-01` or `2026-10-01T00:00:00Z`.
     */
    public ?string $since;

    /**
     * @param array{
     *   cursor?: ?string,
     *   domain?: ?string,
     *   limit?: ?int,
     *   since?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->domain = $values['domain'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->since = $values['since'] ?? null;
    }
}
