<?php

namespace Sequenzy\Integrations\Types;

enum ConnectIntegrationsRequestProvider: string
{
    case Polar = "polar";
    case Paddle = "paddle";
    case Dodo = "dodo";
    case Whop = "whop";
    case Creem = "creem";
    case Chargebee = "chargebee";
    case Clerk = "clerk";
    case Posthog = "posthog";
    case Segment = "segment";
    case Affonso = "affonso";
}
