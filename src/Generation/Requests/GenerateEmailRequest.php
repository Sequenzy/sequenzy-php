<?php

namespace Sequenzy\Generation\Requests;

use Sequenzy\Core\Json\JsonSerializableType;
use Sequenzy\Core\Json\JsonProperty;
use Sequenzy\Generation\Types\GenerateEmailRequestEmailType;

class GenerateEmailRequest extends JsonSerializableType
{
    /**
     * @var ?bool $applyBranding Whether to wrap generated content with the company logo and footer. Set to false to return raw generated content blocks.
     */
    #[JsonProperty('applyBranding')]
    public ?bool $applyBranding;

    /**
     * @var ?value-of<GenerateEmailRequestEmailType> $emailType Email type. Transactional emails include a footer without an unsubscribe link.
     */
    #[JsonProperty('emailType')]
    public ?string $emailType;

    /**
     * @var string $prompt What you want the email to say or accomplish.
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?string $style Optional style guidance.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?string $tone Optional tone guidance.
     */
    #[JsonProperty('tone')]
    public ?string $tone;

    /**
     * @param array{
     *   prompt: string,
     *   applyBranding?: ?bool,
     *   emailType?: ?value-of<GenerateEmailRequestEmailType>,
     *   style?: ?string,
     *   tone?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->applyBranding = $values['applyBranding'] ?? null;
        $this->emailType = $values['emailType'] ?? null;
        $this->prompt = $values['prompt'];
        $this->style = $values['style'] ?? null;
        $this->tone = $values['tone'] ?? null;
    }
}
