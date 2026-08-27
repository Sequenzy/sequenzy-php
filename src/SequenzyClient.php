<?php

namespace Sequenzy;

use Sequenzy\AbTests\AbTestsClient;
use Sequenzy\Account\AccountClient;
use Sequenzy\Analytics\AnalyticsClient;
use Sequenzy\AudienceSyncs\AudienceSyncsClient;
use Sequenzy\Campaigns\CampaignsClient;
use Sequenzy\Companies\CompaniesClient;
use Sequenzy\Conversations\ConversationsClient;
use Sequenzy\EmailBlocks\EmailBlocksClient;
use Sequenzy\EmailComponents\EmailComponentsClient;
use Sequenzy\Emails\EmailsClient;
use Sequenzy\EmailSends\EmailSendsClient;
use Sequenzy\Events\EventsClient;
use Sequenzy\Feedback\FeedbackClient;
use Sequenzy\Generation\GenerationClient;
use Sequenzy\Integrations\IntegrationsClient;
use Sequenzy\LandingPages\LandingPagesClient;
use Sequenzy\Lists\ListsClient;
use Sequenzy\Media\MediaClient;
use Sequenzy\Migrations\MigrationsClient;
use Sequenzy\NotificationPreferences\NotificationPreferencesClient;
use Sequenzy\Orders\OrdersClient;
use Sequenzy\Products\ProductsClient;
use Sequenzy\Segments\SegmentsClient;
use Sequenzy\SenderProfiles\SenderProfilesClient;
use Sequenzy\SendingStatus\SendingStatusClient;
use Sequenzy\Sequences\SequencesClient;
use Sequenzy\Shopify\ShopifyClient;
use Sequenzy\Sms\SmsClient;
use Sequenzy\Subscribers\SubscribersClient;
use Sequenzy\Suppressions\SuppressionsClient;
use Sequenzy\SyncRules\SyncRulesClient;
use Sequenzy\Tags\TagsClient;
use Sequenzy\Team\TeamClient;
use Sequenzy\Templates\TemplatesClient;
use Sequenzy\TrackingSettings\TrackingSettingsClient;
use Sequenzy\Transactional\TransactionalClient;
use Sequenzy\Webhooks\WebhooksClient;
use Sequenzy\Websites\WebsitesClient;
use Sequenzy\WebTrackingKeys\WebTrackingKeysClient;
use Sequenzy\Widgets\WidgetsClient;
use Psr\Http\Client\ClientInterface;
use Sequenzy\Core\Client\RawClient;

class SequenzyClient
{
    /**
     * @var AbTestsClient $abTests
     */
    public AbTestsClient $abTests;

    /**
     * @var AccountClient $account
     */
    public AccountClient $account;

    /**
     * @var AnalyticsClient $analytics
     */
    public AnalyticsClient $analytics;

    /**
     * @var AudienceSyncsClient $audienceSyncs
     */
    public AudienceSyncsClient $audienceSyncs;

    /**
     * @var CampaignsClient $campaigns
     */
    public CampaignsClient $campaigns;

    /**
     * @var CompaniesClient $companies
     */
    public CompaniesClient $companies;

    /**
     * @var ConversationsClient $conversations
     */
    public ConversationsClient $conversations;

    /**
     * @var EmailBlocksClient $emailBlocks
     */
    public EmailBlocksClient $emailBlocks;

    /**
     * @var EmailComponentsClient $emailComponents
     */
    public EmailComponentsClient $emailComponents;

    /**
     * @var EmailsClient $emails
     */
    public EmailsClient $emails;

    /**
     * @var EmailSendsClient $emailSends
     */
    public EmailSendsClient $emailSends;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var FeedbackClient $feedback
     */
    public FeedbackClient $feedback;

    /**
     * @var GenerationClient $generation
     */
    public GenerationClient $generation;

    /**
     * @var IntegrationsClient $integrations
     */
    public IntegrationsClient $integrations;

    /**
     * @var LandingPagesClient $landingPages
     */
    public LandingPagesClient $landingPages;

    /**
     * @var ListsClient $lists
     */
    public ListsClient $lists;

    /**
     * @var MediaClient $media
     */
    public MediaClient $media;

    /**
     * @var MigrationsClient $migrations
     */
    public MigrationsClient $migrations;

    /**
     * @var NotificationPreferencesClient $notificationPreferences
     */
    public NotificationPreferencesClient $notificationPreferences;

    /**
     * @var OrdersClient $orders
     */
    public OrdersClient $orders;

    /**
     * @var ProductsClient $products
     */
    public ProductsClient $products;

    /**
     * @var SegmentsClient $segments
     */
    public SegmentsClient $segments;

    /**
     * @var SenderProfilesClient $senderProfiles
     */
    public SenderProfilesClient $senderProfiles;

    /**
     * @var SendingStatusClient $sendingStatus
     */
    public SendingStatusClient $sendingStatus;

    /**
     * @var SequencesClient $sequences
     */
    public SequencesClient $sequences;

    /**
     * @var ShopifyClient $shopify
     */
    public ShopifyClient $shopify;

    /**
     * @var SmsClient $sms
     */
    public SmsClient $sms;

    /**
     * @var SubscribersClient $subscribers
     */
    public SubscribersClient $subscribers;

    /**
     * @var SuppressionsClient $suppressions
     */
    public SuppressionsClient $suppressions;

    /**
     * @var SyncRulesClient $syncRules
     */
    public SyncRulesClient $syncRules;

    /**
     * @var TagsClient $tags
     */
    public TagsClient $tags;

    /**
     * @var TeamClient $team
     */
    public TeamClient $team;

    /**
     * @var TemplatesClient $templates
     */
    public TemplatesClient $templates;

    /**
     * @var TrackingSettingsClient $trackingSettings
     */
    public TrackingSettingsClient $trackingSettings;

    /**
     * @var TransactionalClient $transactional
     */
    public TransactionalClient $transactional;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var WebsitesClient $websites
     */
    public WebsitesClient $websites;

    /**
     * @var WebTrackingKeysClient $webTrackingKeys
     */
    public WebTrackingKeysClient $webTrackingKeys;

    /**
     * @var WidgetsClient $widgets
     */
    public WidgetsClient $widgets;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $apiKey = null,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Sequenzy',
        ];
        if ($apiKey != null) {
            $defaultHeaders['Authorization'] = "Bearer $apiKey";
        }

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->abTests = new AbTestsClient($this->client, $this->options);
        $this->account = new AccountClient($this->client, $this->options);
        $this->analytics = new AnalyticsClient($this->client, $this->options);
        $this->audienceSyncs = new AudienceSyncsClient($this->client, $this->options);
        $this->campaigns = new CampaignsClient($this->client, $this->options);
        $this->companies = new CompaniesClient($this->client, $this->options);
        $this->conversations = new ConversationsClient($this->client, $this->options);
        $this->emailBlocks = new EmailBlocksClient($this->client, $this->options);
        $this->emailComponents = new EmailComponentsClient($this->client, $this->options);
        $this->emails = new EmailsClient($this->client, $this->options);
        $this->emailSends = new EmailSendsClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->feedback = new FeedbackClient($this->client, $this->options);
        $this->generation = new GenerationClient($this->client, $this->options);
        $this->integrations = new IntegrationsClient($this->client, $this->options);
        $this->landingPages = new LandingPagesClient($this->client, $this->options);
        $this->lists = new ListsClient($this->client, $this->options);
        $this->media = new MediaClient($this->client, $this->options);
        $this->migrations = new MigrationsClient($this->client, $this->options);
        $this->notificationPreferences = new NotificationPreferencesClient($this->client, $this->options);
        $this->orders = new OrdersClient($this->client, $this->options);
        $this->products = new ProductsClient($this->client, $this->options);
        $this->segments = new SegmentsClient($this->client, $this->options);
        $this->senderProfiles = new SenderProfilesClient($this->client, $this->options);
        $this->sendingStatus = new SendingStatusClient($this->client, $this->options);
        $this->sequences = new SequencesClient($this->client, $this->options);
        $this->shopify = new ShopifyClient($this->client, $this->options);
        $this->sms = new SmsClient($this->client, $this->options);
        $this->subscribers = new SubscribersClient($this->client, $this->options);
        $this->suppressions = new SuppressionsClient($this->client, $this->options);
        $this->syncRules = new SyncRulesClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->team = new TeamClient($this->client, $this->options);
        $this->templates = new TemplatesClient($this->client, $this->options);
        $this->trackingSettings = new TrackingSettingsClient($this->client, $this->options);
        $this->transactional = new TransactionalClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
        $this->websites = new WebsitesClient($this->client, $this->options);
        $this->webTrackingKeys = new WebTrackingKeysClient($this->client, $this->options);
        $this->widgets = new WidgetsClient($this->client, $this->options);
    }
}
