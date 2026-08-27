<?php

namespace Sequenzy\Emails\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Traits\EmailBodyInput;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Emails\Types\UpdateBlocksEmailsRequestType;
use Sequenzy\Types\EmailBlock;

class UpdateBlocksEmailsRequest extends JsonSerializableType
{
    use EmailBodyInput;

    /**
     * @var ?string $blockId Existing block ID to mutate.
     */
    #[JsonProperty('blockId')]
    public ?string $blockId;

    /**
     * @var ?string $content Optional replacement content for the mutated block.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?value-of<UpdateBlocksEmailsRequestType> $type New block type. Type mutation supports text and html.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @param array{
     *   blockId?: ?string,
     *   content?: ?string,
     *   type?: ?value-of<UpdateBlocksEmailsRequestType>,
     *   blocks?: ?array<EmailBlock>,
     *   html?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockId = $values['blockId'] ?? null;
        $this->content = $values['content'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->blocks = $values['blocks'] ?? null;
        $this->html = $values['html'] ?? null;
    }
}
