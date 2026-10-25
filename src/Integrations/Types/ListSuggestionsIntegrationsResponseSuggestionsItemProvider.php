<?php

namespace Sequenzy\Integrations\Types;

enum ListSuggestionsIntegrationsResponseSuggestionsItemProvider: string
{
    case Shopify = "shopify";
    case Clerk = "clerk";
    case Supabase = "supabase";
    case Posthog = "posthog";
    case Segment = "segment";
    case Woocommerce = "woocommerce";
    case Wordpress = "wordpress";
    case Webflow = "webflow";
    case Wix = "wix";
}
