<?php

namespace Sequenzy\Types;

enum WebsiteReadinessReason: string
{
    case DnsNotStarted = "dns_not_started";
    case DnsPending = "dns_pending";
    case DnsFailed = "dns_failed";
    case ActivationPending = "activation_pending";
    case ActivationFailed = "activation_failed";
    case SendingUnavailable = "sending_unavailable";
}
