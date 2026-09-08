<?php

namespace Sequenzy\Types;

use Sequenzy\Core\Json\JsonSerializableType;
use Exception;

class LandingPageBlock extends JsonSerializableType
{
    /**
     * @var (
     *    'button'
     *   |'custom-html'
     *   |'divider'
     *   |'faq'
     *   |'feature-grid'
     *   |'footer'
     *   |'form'
     *   |'group'
     *   |'heading'
     *   |'image'
     *   |'logo-cloud'
     *   |'pricing'
     *   |'spacer'
     *   |'stats'
     *   |'testimonial'
     *   |'text'
     *   |'video'
     *   |'_unknown'
     * ) $kind
     */
    public readonly string $kind;

    /**
     * @var (
     *    LandingPageButtonBlock
     *   |LandingPageCustomHtmlBlock
     *   |LandingPageDividerBlock
     *   |LandingPageFaqBlock
     *   |LandingPageFeatureGridBlock
     *   |LandingPageFooterBlock
     *   |LandingPageFormBlock
     *   |LandingPageGroupBlock
     *   |LandingPageHeadingBlock
     *   |LandingPageImageBlock
     *   |LandingPageLogoCloudBlock
     *   |LandingPagePricingBlock
     *   |LandingPageSpacerBlock
     *   |LandingPageStatsBlock
     *   |LandingPageTestimonialBlock
     *   |LandingPageTextBlock
     *   |LandingPageVideoBlock
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   kind: (
     *    'button'
     *   |'custom-html'
     *   |'divider'
     *   |'faq'
     *   |'feature-grid'
     *   |'footer'
     *   |'form'
     *   |'group'
     *   |'heading'
     *   |'image'
     *   |'logo-cloud'
     *   |'pricing'
     *   |'spacer'
     *   |'stats'
     *   |'testimonial'
     *   |'text'
     *   |'video'
     *   |'_unknown'
     * ),
     *   value: (
     *    LandingPageButtonBlock
     *   |LandingPageCustomHtmlBlock
     *   |LandingPageDividerBlock
     *   |LandingPageFaqBlock
     *   |LandingPageFeatureGridBlock
     *   |LandingPageFooterBlock
     *   |LandingPageFormBlock
     *   |LandingPageGroupBlock
     *   |LandingPageHeadingBlock
     *   |LandingPageImageBlock
     *   |LandingPageLogoCloudBlock
     *   |LandingPagePricingBlock
     *   |LandingPageSpacerBlock
     *   |LandingPageStatsBlock
     *   |LandingPageTestimonialBlock
     *   |LandingPageTextBlock
     *   |LandingPageVideoBlock
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
     * @param LandingPageButtonBlock $button
     * @return LandingPageBlock
     */
    public static function button(LandingPageButtonBlock $button): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'button',
            'value' => $button,
        ]);
    }

    /**
     * @param LandingPageCustomHtmlBlock $customHtml
     * @return LandingPageBlock
     */
    public static function customHtml(LandingPageCustomHtmlBlock $customHtml): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'custom-html',
            'value' => $customHtml,
        ]);
    }

    /**
     * @param LandingPageDividerBlock $divider
     * @return LandingPageBlock
     */
    public static function divider(LandingPageDividerBlock $divider): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'divider',
            'value' => $divider,
        ]);
    }

    /**
     * @param LandingPageFaqBlock $faq
     * @return LandingPageBlock
     */
    public static function faq(LandingPageFaqBlock $faq): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'faq',
            'value' => $faq,
        ]);
    }

    /**
     * @param LandingPageFeatureGridBlock $featureGrid
     * @return LandingPageBlock
     */
    public static function featureGrid(LandingPageFeatureGridBlock $featureGrid): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'feature-grid',
            'value' => $featureGrid,
        ]);
    }

    /**
     * @param LandingPageFooterBlock $footer
     * @return LandingPageBlock
     */
    public static function footer(LandingPageFooterBlock $footer): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'footer',
            'value' => $footer,
        ]);
    }

    /**
     * @param LandingPageFormBlock $form
     * @return LandingPageBlock
     */
    public static function form(LandingPageFormBlock $form): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'form',
            'value' => $form,
        ]);
    }

    /**
     * @param LandingPageGroupBlock $group
     * @return LandingPageBlock
     */
    public static function group(LandingPageGroupBlock $group): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'group',
            'value' => $group,
        ]);
    }

    /**
     * @param LandingPageHeadingBlock $heading
     * @return LandingPageBlock
     */
    public static function heading(LandingPageHeadingBlock $heading): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'heading',
            'value' => $heading,
        ]);
    }

    /**
     * @param LandingPageImageBlock $image
     * @return LandingPageBlock
     */
    public static function image(LandingPageImageBlock $image): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'image',
            'value' => $image,
        ]);
    }

    /**
     * @param LandingPageLogoCloudBlock $logoCloud
     * @return LandingPageBlock
     */
    public static function logoCloud(LandingPageLogoCloudBlock $logoCloud): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'logo-cloud',
            'value' => $logoCloud,
        ]);
    }

    /**
     * @param LandingPagePricingBlock $pricing
     * @return LandingPageBlock
     */
    public static function pricing(LandingPagePricingBlock $pricing): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'pricing',
            'value' => $pricing,
        ]);
    }

    /**
     * @param LandingPageSpacerBlock $spacer
     * @return LandingPageBlock
     */
    public static function spacer(LandingPageSpacerBlock $spacer): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'spacer',
            'value' => $spacer,
        ]);
    }

    /**
     * @param LandingPageStatsBlock $stats
     * @return LandingPageBlock
     */
    public static function stats(LandingPageStatsBlock $stats): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'stats',
            'value' => $stats,
        ]);
    }

    /**
     * @param LandingPageTestimonialBlock $testimonial
     * @return LandingPageBlock
     */
    public static function testimonial(LandingPageTestimonialBlock $testimonial): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'testimonial',
            'value' => $testimonial,
        ]);
    }

    /**
     * @param LandingPageTextBlock $text
     * @return LandingPageBlock
     */
    public static function text(LandingPageTextBlock $text): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @param LandingPageVideoBlock $video
     * @return LandingPageBlock
     */
    public static function video(LandingPageVideoBlock $video): LandingPageBlock
    {
        return new LandingPageBlock([
            'kind' => 'video',
            'value' => $video,
        ]);
    }

    /**
     * @return bool
     */
    public function isButton(): bool
    {
        return $this->value instanceof LandingPageButtonBlock && $this->kind === 'button';
    }

    /**
     * @return LandingPageButtonBlock
     */
    public function asButton(): LandingPageButtonBlock
    {
        if (!($this->value instanceof LandingPageButtonBlock && $this->kind === 'button')) {
            throw new Exception(
                "Expected button; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCustomHtml(): bool
    {
        return $this->value instanceof LandingPageCustomHtmlBlock && $this->kind === 'custom-html';
    }

    /**
     * @return LandingPageCustomHtmlBlock
     */
    public function asCustomHtml(): LandingPageCustomHtmlBlock
    {
        if (!($this->value instanceof LandingPageCustomHtmlBlock && $this->kind === 'custom-html')) {
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
        return $this->value instanceof LandingPageDividerBlock && $this->kind === 'divider';
    }

    /**
     * @return LandingPageDividerBlock
     */
    public function asDivider(): LandingPageDividerBlock
    {
        if (!($this->value instanceof LandingPageDividerBlock && $this->kind === 'divider')) {
            throw new Exception(
                "Expected divider; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFaq(): bool
    {
        return $this->value instanceof LandingPageFaqBlock && $this->kind === 'faq';
    }

    /**
     * @return LandingPageFaqBlock
     */
    public function asFaq(): LandingPageFaqBlock
    {
        if (!($this->value instanceof LandingPageFaqBlock && $this->kind === 'faq')) {
            throw new Exception(
                "Expected faq; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFeatureGrid(): bool
    {
        return $this->value instanceof LandingPageFeatureGridBlock && $this->kind === 'feature-grid';
    }

    /**
     * @return LandingPageFeatureGridBlock
     */
    public function asFeatureGrid(): LandingPageFeatureGridBlock
    {
        if (!($this->value instanceof LandingPageFeatureGridBlock && $this->kind === 'feature-grid')) {
            throw new Exception(
                "Expected feature-grid; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isFooter(): bool
    {
        return $this->value instanceof LandingPageFooterBlock && $this->kind === 'footer';
    }

    /**
     * @return LandingPageFooterBlock
     */
    public function asFooter(): LandingPageFooterBlock
    {
        if (!($this->value instanceof LandingPageFooterBlock && $this->kind === 'footer')) {
            throw new Exception(
                "Expected footer; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isForm(): bool
    {
        return $this->value instanceof LandingPageFormBlock && $this->kind === 'form';
    }

    /**
     * @return LandingPageFormBlock
     */
    public function asForm(): LandingPageFormBlock
    {
        if (!($this->value instanceof LandingPageFormBlock && $this->kind === 'form')) {
            throw new Exception(
                "Expected form; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isGroup(): bool
    {
        return $this->value instanceof LandingPageGroupBlock && $this->kind === 'group';
    }

    /**
     * @return LandingPageGroupBlock
     */
    public function asGroup(): LandingPageGroupBlock
    {
        if (!($this->value instanceof LandingPageGroupBlock && $this->kind === 'group')) {
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
        return $this->value instanceof LandingPageHeadingBlock && $this->kind === 'heading';
    }

    /**
     * @return LandingPageHeadingBlock
     */
    public function asHeading(): LandingPageHeadingBlock
    {
        if (!($this->value instanceof LandingPageHeadingBlock && $this->kind === 'heading')) {
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
        return $this->value instanceof LandingPageImageBlock && $this->kind === 'image';
    }

    /**
     * @return LandingPageImageBlock
     */
    public function asImage(): LandingPageImageBlock
    {
        if (!($this->value instanceof LandingPageImageBlock && $this->kind === 'image')) {
            throw new Exception(
                "Expected image; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLogoCloud(): bool
    {
        return $this->value instanceof LandingPageLogoCloudBlock && $this->kind === 'logo-cloud';
    }

    /**
     * @return LandingPageLogoCloudBlock
     */
    public function asLogoCloud(): LandingPageLogoCloudBlock
    {
        if (!($this->value instanceof LandingPageLogoCloudBlock && $this->kind === 'logo-cloud')) {
            throw new Exception(
                "Expected logo-cloud; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPricing(): bool
    {
        return $this->value instanceof LandingPagePricingBlock && $this->kind === 'pricing';
    }

    /**
     * @return LandingPagePricingBlock
     */
    public function asPricing(): LandingPagePricingBlock
    {
        if (!($this->value instanceof LandingPagePricingBlock && $this->kind === 'pricing')) {
            throw new Exception(
                "Expected pricing; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSpacer(): bool
    {
        return $this->value instanceof LandingPageSpacerBlock && $this->kind === 'spacer';
    }

    /**
     * @return LandingPageSpacerBlock
     */
    public function asSpacer(): LandingPageSpacerBlock
    {
        if (!($this->value instanceof LandingPageSpacerBlock && $this->kind === 'spacer')) {
            throw new Exception(
                "Expected spacer; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isStats(): bool
    {
        return $this->value instanceof LandingPageStatsBlock && $this->kind === 'stats';
    }

    /**
     * @return LandingPageStatsBlock
     */
    public function asStats(): LandingPageStatsBlock
    {
        if (!($this->value instanceof LandingPageStatsBlock && $this->kind === 'stats')) {
            throw new Exception(
                "Expected stats; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTestimonial(): bool
    {
        return $this->value instanceof LandingPageTestimonialBlock && $this->kind === 'testimonial';
    }

    /**
     * @return LandingPageTestimonialBlock
     */
    public function asTestimonial(): LandingPageTestimonialBlock
    {
        if (!($this->value instanceof LandingPageTestimonialBlock && $this->kind === 'testimonial')) {
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
        return $this->value instanceof LandingPageTextBlock && $this->kind === 'text';
    }

    /**
     * @return LandingPageTextBlock
     */
    public function asText(): LandingPageTextBlock
    {
        if (!($this->value instanceof LandingPageTextBlock && $this->kind === 'text')) {
            throw new Exception(
                "Expected text; got " . $this->kind . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->value instanceof LandingPageVideoBlock && $this->kind === 'video';
    }

    /**
     * @return LandingPageVideoBlock
     */
    public function asVideo(): LandingPageVideoBlock
    {
        if (!($this->value instanceof LandingPageVideoBlock && $this->kind === 'video')) {
            throw new Exception(
                "Expected video; got " . $this->kind . " with value of type " . get_debug_type($this->value),
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
            case 'custom-html':
                $value = $this->asCustomHtml()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'divider':
                $value = $this->asDivider()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'faq':
                $value = $this->asFaq()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'feature-grid':
                $value = $this->asFeatureGrid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'footer':
                $value = $this->asFooter()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'form':
                $value = $this->asForm()->jsonSerialize();
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
            case 'logo-cloud':
                $value = $this->asLogoCloud()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'pricing':
                $value = $this->asPricing()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'spacer':
                $value = $this->asSpacer()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'stats':
                $value = $this->asStats()->jsonSerialize();
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
            case 'video':
                $value = $this->asVideo()->jsonSerialize();
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
                $args['value'] = LandingPageButtonBlock::jsonDeserialize($data);
                break;
            case 'custom-html':
                $args['value'] = LandingPageCustomHtmlBlock::jsonDeserialize($data);
                break;
            case 'divider':
                $args['value'] = LandingPageDividerBlock::jsonDeserialize($data);
                break;
            case 'faq':
                $args['value'] = LandingPageFaqBlock::jsonDeserialize($data);
                break;
            case 'feature-grid':
                $args['value'] = LandingPageFeatureGridBlock::jsonDeserialize($data);
                break;
            case 'footer':
                $args['value'] = LandingPageFooterBlock::jsonDeserialize($data);
                break;
            case 'form':
                $args['value'] = LandingPageFormBlock::jsonDeserialize($data);
                break;
            case 'group':
                $args['value'] = LandingPageGroupBlock::jsonDeserialize($data);
                break;
            case 'heading':
                $args['value'] = LandingPageHeadingBlock::jsonDeserialize($data);
                break;
            case 'image':
                $args['value'] = LandingPageImageBlock::jsonDeserialize($data);
                break;
            case 'logo-cloud':
                $args['value'] = LandingPageLogoCloudBlock::jsonDeserialize($data);
                break;
            case 'pricing':
                $args['value'] = LandingPagePricingBlock::jsonDeserialize($data);
                break;
            case 'spacer':
                $args['value'] = LandingPageSpacerBlock::jsonDeserialize($data);
                break;
            case 'stats':
                $args['value'] = LandingPageStatsBlock::jsonDeserialize($data);
                break;
            case 'testimonial':
                $args['value'] = LandingPageTestimonialBlock::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = LandingPageTextBlock::jsonDeserialize($data);
                break;
            case 'video':
                $args['value'] = LandingPageVideoBlock::jsonDeserialize($data);
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
