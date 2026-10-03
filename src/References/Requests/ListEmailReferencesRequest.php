<?php

namespace Sequenzy\References\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\References\Types\ListEmailReferencesRequestKind;
use Sequenzy\References\Types\ListEmailReferencesRequestScope;

class ListEmailReferencesRequest extends JsonSerializableType
{
    /**
     * @var value-of<ListEmailReferencesRequestKind> $kind
     */
    public string $kind;

    /**
     * @var ?int $limit For `scope=similar` without `q`, most emails (and sequences) to return. Also caps sequences elsewhere.
     */
    public ?int $limit;

    /**
     * @var ?int $page Page for `scope=all` or a search.
     */
    public ?int $page;

    /**
     * @var ?string $q Search words matched by meaning, most relevant first. With `scope=similar` only those brands' emails are searched. A search is paged.
     */
    public ?string $q;

    /**
     * @var ?value-of<ListEmailReferencesRequestScope> $scope `similar` (default) lists emails from the gallery brands most like you; `all` lists the whole gallery for the kind, a page at a time.
     */
    public ?string $scope;

    /**
     * @var ?string $subtype For `scope=similar` without `q`, a gallery subtype to list first, such as `password_reset`. Ignored when it does not belong to the kind.
     */
    public ?string $subtype;

    /**
     * @param array{
     *   kind: value-of<ListEmailReferencesRequestKind>,
     *   limit?: ?int,
     *   page?: ?int,
     *   q?: ?string,
     *   scope?: ?value-of<ListEmailReferencesRequestScope>,
     *   subtype?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
        $this->limit = $values['limit'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->q = $values['q'] ?? null;
        $this->scope = $values['scope'] ?? null;
        $this->subtype = $values['subtype'] ?? null;
    }
}
