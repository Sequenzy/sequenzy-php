<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;

class RenderEmailResponseUnresolvedMergeTagsItem extends JsonSerializableType
{
    /**
     * @var value-of<RenderEmailResponseUnresolvedMergeTagsItemReason> $reason unknown - nothing provides this name, so it stays empty for every recipient. no_value - recognized or unverifiable, but blank for this contact. An unknown name is reported even when a default filter supplied text in its place, because that fallback then reaches every recipient while the rendered HTML looks correctly personalized; a recognized name that is merely blank for this contact is not reported when it has a default. A name is only called unknown when the render had a source to check it against. Without the contact's attributes nothing is checkable, since a bare {{plan}} reads the same attribute map as {{subscriber.plan}}, so pass a stored subscriberId or an inline subscriber with customAttributes. Beyond that, event.* needs sample event properties in variables, recommendedProducts.* needs a stored subscriberId the catalog has something to recommend for, and discount.* is only checkable on a sequence step whose incoming paths all run the same discount step. Rendering a transactional email is checkable only when variables is passed, since its tags come from the variables of each send call and carry no prefix marking them. Otherwise those tags land in no_value rather than in unknown. An optional attribute this contact never had set is kept out of unknown by checking the names other contacts in the account carry, which needs the subscribers:read scope; a key without it may report such a name as unknown.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @var string $tag Tag name as authored, without braces.
     */
    #[JsonProperty('tag')]
    public string $tag;

    /**
     * @param array{
     *   reason: value-of<RenderEmailResponseUnresolvedMergeTagsItemReason>,
     *   tag: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
        $this->tag = $values['tag'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
