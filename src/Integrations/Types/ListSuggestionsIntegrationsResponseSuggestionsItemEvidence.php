<?php

namespace Sequenzy\Integrations\Types;

enum ListSuggestionsIntegrationsResponseSuggestionsItemEvidence: string
{
    case Homepage = "homepage";
    case SignInPage = "sign_in_page";
    case Storefront = "storefront";
}
