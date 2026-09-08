<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Exception;

/**
 * Form content block, selected by kind. Returned content includes normalized defaults.
 */
class FormCaptureBlock extends JsonSerializableType
{
    /**
     * @var (
     *    'button'
     *   |'countdown'
     *   |'custom-html'
     *   |'divider'
     *   |'error-state'
     *   |'feature-grid'
     *   |'form-field'
     *   |'form-step'
     *   |'group'
     *   |'heading'
     *   |'image'
     *   |'spacer'
     *   |'submit-button'
     *   |'success-screen'
     *   |'testimonial'
     *   |'text'
     *   |'_unknown'
     * ) $kind
     */
    public readonly string $kind;

    /**
     * @var (
     *    CaptureButtonBlock
     *   |CaptureCountdownBlock
     *   |CaptureCustomHtmlBlock
     *   |CaptureDividerBlock
     *   |FormCaptureErrorStateBlock
     *   |CaptureFeatureGridBlock
     *   |FormCaptureFieldBlock
     *   |FormCaptureStepBlock
     *   |CaptureGroupBlock
     *   |CaptureHeadingBlock
     *   |CaptureImageBlock
     *   |CaptureSpacerBlock
     *   |FormCaptureSubmitButtonBlock
     *   |FormCaptureSuccessScreenBlock
     *   |CaptureTestimonialBlock
     *   |CaptureTextBlock
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   kind: (
     *    'button'
     *   |'countdown'
     *   |'custom-html'
     *   |'divider'
     *   |'error-state'
     *   |'feature-grid'
     *   |'form-field'
     *   |'form-step'
     *   |'group'
     *   |'heading'
     *   |'image'
     *   |'spacer'
     *   |'submit-button'
     *   |'success-screen'
     *   |'testimonial'
     *   |'text'
     *   |'_unknown'
     * ),
     *   value: (
     *    CaptureButtonBlock
     *   |CaptureCountdownBlock
     *   |CaptureCustomHtmlBlock
     *   |CaptureDividerBlock
     *   |FormCaptureErrorStateBlock
     *   |CaptureFeatureGridBlock
     *   |FormCaptureFieldBlock
     *   |FormCaptureStepBlock
     *   |CaptureGroupBlock
     *   |CaptureHeadingBlock
     *   |CaptureImageBlock
     *   |CaptureSpacerBlock
     *   |FormCaptureSubmitButtonBlock
     *   |FormCaptureSuccessScreenBlock
     *   |CaptureTestimonialBlock
     *   |CaptureTextBlock
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
        $this->value = $values['value'];
    }

    /**
     * @param CaptureButtonBlock $button
     * @return FormCaptureBlock
     */
    public static function button(CaptureButtonBlock $button): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'button',
            'value' => $button,
        ]);
    }

    /**
     * @param CaptureCountdownBlock $countdown
     * @return FormCaptureBlock
     */
    public static function countdown(CaptureCountdownBlock $countdown): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'countdown',
            'value' => $countdown,
        ]);
    }

    /**
     * @param CaptureCustomHtmlBlock $customHtml
     * @return FormCaptureBlock
     */
    public static function customHtml(CaptureCustomHtmlBlock $customHtml): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'custom-html',
            'value' => $customHtml,
        ]);
    }

    /**
     * @param CaptureDividerBlock $divider
     * @return FormCaptureBlock
     */
    public static function divider(CaptureDividerBlock $divider): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'divider',
            'value' => $divider,
        ]);
    }

    /**
     * @param FormCaptureErrorStateBlock $errorState
     * @return FormCaptureBlock
     */
    public static function errorState(FormCaptureErrorStateBlock $errorState): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'error-state',
            'value' => $errorState,
        ]);
    }

    /**
     * @param CaptureFeatureGridBlock $featureGrid
     * @return FormCaptureBlock
     */
    public static function featureGrid(CaptureFeatureGridBlock $featureGrid): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'feature-grid',
            'value' => $featureGrid,
        ]);
    }

    /**
     * @param FormCaptureFieldBlock $formField
     * @return FormCaptureBlock
     */
    public static function formField(FormCaptureFieldBlock $formField): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'form-field',
            'value' => $formField,
        ]);
    }

    /**
     * @param FormCaptureStepBlock $formStep
     * @return FormCaptureBlock
     */
    public static function formStep(FormCaptureStepBlock $formStep): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'form-step',
            'value' => $formStep,
        ]);
    }

    /**
     * @param CaptureGroupBlock $group
     * @return FormCaptureBlock
     */
    public static function group(CaptureGroupBlock $group): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'group',
            'value' => $group,
        ]);
    }

    /**
     * @param CaptureHeadingBlock $heading
     * @return FormCaptureBlock
     */
    public static function heading(CaptureHeadingBlock $heading): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'heading',
            'value' => $heading,
        ]);
    }

    /**
     * @param CaptureImageBlock $image
     * @return FormCaptureBlock
     */
    public static function image(CaptureImageBlock $image): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'image',
            'value' => $image,
        ]);
    }

    /**
     * @param CaptureSpacerBlock $spacer
     * @return FormCaptureBlock
     */
    public static function spacer(CaptureSpacerBlock $spacer): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'spacer',
            'value' => $spacer,
        ]);
    }

    /**
     * @param FormCaptureSubmitButtonBlock $submitButton
     * @return FormCaptureBlock
     */
    public static function submitButton(FormCaptureSubmitButtonBlock $submitButton): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'submit-button',
            'value' => $submitButton,
        ]);
    }

    /**
     * @param FormCaptureSuccessScreenBlock $successScreen
     * @return FormCaptureBlock
     */
    public static function successScreen(FormCaptureSuccessScreenBlock $successScreen): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'success-screen',
            'value' => $successScreen,
        ]);
    }

    /**
     * @param CaptureTestimonialBlock $testimonial
     * @return FormCaptureBlock
     */
    public static function testimonial(CaptureTestimonialBlock $testimonial): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'testimonial',
            'value' => $testimonial,
        ]);
    }

    /**
     * @param CaptureTextBlock $text
     * @return FormCaptureBlock
     */
    public static function text(CaptureTextBlock $text): FormCaptureBlock
    {
        return new FormCaptureBlock([
            'kind' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->value instanceof CaptureButtonBlock && $this->kind === 'button';
    }

    /**
     * @return CaptureButtonBlock
     */
    public function asButton(): CaptureButtonBlock
    {
        if (!($this->value instanceof CaptureButtonBlock && $this->kind === 'button')) {
            throw new Exception(
                "Expected button; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCountdown(): bool
    {
        return $this->value instanceof CaptureCountdownBlock && $this->kind === 'countdown';
    }

    /**
     * @return CaptureCountdownBlock
     */
    public function asCountdown(): CaptureCountdownBlock
    {
        if (!($this->value instanceof CaptureCountdownBlock && $this->kind === 'countdown')) {
            throw new Exception(
                "Expected countdown; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCustomHtml(): bool
    {
        return $this->value instanceof CaptureCustomHtmlBlock && $this->kind === 'custom-html';
    }

    /**
     * @return CaptureCustomHtmlBlock
     */
    public function asCustomHtml(): CaptureCustomHtmlBlock
    {
        if (!($this->value instanceof CaptureCustomHtmlBlock && $this->kind === 'custom-html')) {
            throw new Exception(
                "Expected custom-html; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDivider(): bool
    {
        return $this->value instanceof CaptureDividerBlock && $this->kind === 'divider';
    }

    /**
     * @return CaptureDividerBlock
     */
    public function asDivider(): CaptureDividerBlock
    {
        if (!($this->value instanceof CaptureDividerBlock && $this->kind === 'divider')) {
            throw new Exception(
                "Expected divider; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isErrorState(): bool
    {
        return $this->value instanceof FormCaptureErrorStateBlock && $this->kind === 'error-state';
    }

    /**
     * @return FormCaptureErrorStateBlock
     */
    public function asErrorState(): FormCaptureErrorStateBlock
    {
        if (!($this->value instanceof FormCaptureErrorStateBlock && $this->kind === 'error-state')) {
            throw new Exception(
                "Expected error-state; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFeatureGrid(): bool
    {
        return $this->value instanceof CaptureFeatureGridBlock && $this->kind === 'feature-grid';
    }

    /**
     * @return CaptureFeatureGridBlock
     */
    public function asFeatureGrid(): CaptureFeatureGridBlock
    {
        if (!($this->value instanceof CaptureFeatureGridBlock && $this->kind === 'feature-grid')) {
            throw new Exception(
                "Expected feature-grid; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFormField(): bool
    {
        return $this->value instanceof FormCaptureFieldBlock && $this->kind === 'form-field';
    }

    /**
     * @return FormCaptureFieldBlock
     */
    public function asFormField(): FormCaptureFieldBlock
    {
        if (!($this->value instanceof FormCaptureFieldBlock && $this->kind === 'form-field')) {
            throw new Exception(
                "Expected form-field; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFormStep(): bool
    {
        return $this->value instanceof FormCaptureStepBlock && $this->kind === 'form-step';
    }

    /**
     * @return FormCaptureStepBlock
     */
    public function asFormStep(): FormCaptureStepBlock
    {
        if (!($this->value instanceof FormCaptureStepBlock && $this->kind === 'form-step')) {
            throw new Exception(
                "Expected form-step; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isGroup(): bool
    {
        return $this->value instanceof CaptureGroupBlock && $this->kind === 'group';
    }

    /**
     * @return CaptureGroupBlock
     */
    public function asGroup(): CaptureGroupBlock
    {
        if (!($this->value instanceof CaptureGroupBlock && $this->kind === 'group')) {
            throw new Exception(
                "Expected group; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isHeading(): bool
    {
        return $this->value instanceof CaptureHeadingBlock && $this->kind === 'heading';
    }

    /**
     * @return CaptureHeadingBlock
     */
    public function asHeading(): CaptureHeadingBlock
    {
        if (!($this->value instanceof CaptureHeadingBlock && $this->kind === 'heading')) {
            throw new Exception(
                "Expected heading; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        return $this->value instanceof CaptureImageBlock && $this->kind === 'image';
    }

    /**
     * @return CaptureImageBlock
     */
    public function asImage(): CaptureImageBlock
    {
        if (!($this->value instanceof CaptureImageBlock && $this->kind === 'image')) {
            throw new Exception(
                "Expected image; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSpacer(): bool
    {
        return $this->value instanceof CaptureSpacerBlock && $this->kind === 'spacer';
    }

    /**
     * @return CaptureSpacerBlock
     */
    public function asSpacer(): CaptureSpacerBlock
    {
        if (!($this->value instanceof CaptureSpacerBlock && $this->kind === 'spacer')) {
            throw new Exception(
                "Expected spacer; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSubmitButton(): bool
    {
        return $this->value instanceof FormCaptureSubmitButtonBlock && $this->kind === 'submit-button';
    }

    /**
     * @return FormCaptureSubmitButtonBlock
     */
    public function asSubmitButton(): FormCaptureSubmitButtonBlock
    {
        if (!($this->value instanceof FormCaptureSubmitButtonBlock && $this->kind === 'submit-button')) {
            throw new Exception(
                "Expected submit-button; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSuccessScreen(): bool
    {
        return $this->value instanceof FormCaptureSuccessScreenBlock && $this->kind === 'success-screen';
    }

    /**
     * @return FormCaptureSuccessScreenBlock
     */
    public function asSuccessScreen(): FormCaptureSuccessScreenBlock
    {
        if (!($this->value instanceof FormCaptureSuccessScreenBlock && $this->kind === 'success-screen')) {
            throw new Exception(
                "Expected success-screen; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTestimonial(): bool
    {
        return $this->value instanceof CaptureTestimonialBlock && $this->kind === 'testimonial';
    }

    /**
     * @return CaptureTestimonialBlock
     */
    public function asTestimonial(): CaptureTestimonialBlock
    {
        if (!($this->value instanceof CaptureTestimonialBlock && $this->kind === 'testimonial')) {
            throw new Exception(
                "Expected testimonial; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return $this->value instanceof CaptureTextBlock && $this->kind === 'text';
    }

    /**
     * @return CaptureTextBlock
     */
    public function asText(): CaptureTextBlock
    {
        if (!($this->value instanceof CaptureTextBlock && $this->kind === 'text')) {
            throw new Exception(
                "Expected text; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['kind'] = $this->kind;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->kind) {
            case 'button':
                $value = $this->asButton()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'countdown':
                $value = $this->asCountdown()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'custom-html':
                $value = $this->asCustomHtml()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'divider':
                $value = $this->asDivider()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'error-state':
                $value = $this->asErrorState()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'feature-grid':
                $value = $this->asFeatureGrid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'form-field':
                $value = $this->asFormField()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'form-step':
                $value = $this->asFormStep()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'group':
                $value = $this->asGroup()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'heading':
                $value = $this->asHeading()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'image':
                $value = $this->asImage()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'spacer':
                $value = $this->asSpacer()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'submit-button':
                $value = $this->asSubmitButton()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'success-screen':
                $value = $this->asSuccessScreen()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'testimonial':
                $value = $this->asTestimonial()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'text':
                $value = $this->asText()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('kind', $data)) {
            throw new Exception(
                "JSON data is missing property 'kind'",
            );
        }
        $kind = $data['kind'];
        if (!(is_string($kind))) {
            throw new Exception(
                "Expected property 'kind' in JSON data to be string, instead received " . get_debug_type($data['kind']),
            );
        }

        $args['kind'] = $kind;
        switch ($kind) {
            case 'button':
                $args['value'] = CaptureButtonBlock::jsonDeserialize($data);
                break;
            case 'countdown':
                $args['value'] = CaptureCountdownBlock::jsonDeserialize($data);
                break;
            case 'custom-html':
                $args['value'] = CaptureCustomHtmlBlock::jsonDeserialize($data);
                break;
            case 'divider':
                $args['value'] = CaptureDividerBlock::jsonDeserialize($data);
                break;
            case 'error-state':
                $args['value'] = FormCaptureErrorStateBlock::jsonDeserialize($data);
                break;
            case 'feature-grid':
                $args['value'] = CaptureFeatureGridBlock::jsonDeserialize($data);
                break;
            case 'form-field':
                $args['value'] = FormCaptureFieldBlock::jsonDeserialize($data);
                break;
            case 'form-step':
                $args['value'] = FormCaptureStepBlock::jsonDeserialize($data);
                break;
            case 'group':
                $args['value'] = CaptureGroupBlock::jsonDeserialize($data);
                break;
            case 'heading':
                $args['value'] = CaptureHeadingBlock::jsonDeserialize($data);
                break;
            case 'image':
                $args['value'] = CaptureImageBlock::jsonDeserialize($data);
                break;
            case 'spacer':
                $args['value'] = CaptureSpacerBlock::jsonDeserialize($data);
                break;
            case 'submit-button':
                $args['value'] = FormCaptureSubmitButtonBlock::jsonDeserialize($data);
                break;
            case 'success-screen':
                $args['value'] = FormCaptureSuccessScreenBlock::jsonDeserialize($data);
                break;
            case 'testimonial':
                $args['value'] = CaptureTestimonialBlock::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = CaptureTextBlock::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['kind'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
