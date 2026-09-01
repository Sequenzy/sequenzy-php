<?php

namespace Sequenzy\Types;

enum CompanyEmailBrandingSubscriptionTier: string
{
    case Free = "free";
    case Pro1K = "pro_1k";
    case Pro5K = "pro_5k";
    case Pro10K = "pro_10k";
    case Pro25K = "pro_25k";
    case Pro30K = "pro_30k";
    case Pro50K = "pro_50k";
    case Pro100K = "pro_100k";
    case Pro150K = "pro_150k";
    case Pro2M = "pro_2m";
    case Pro3M = "pro_3m";
    case Pro4M = "pro_4m";
    case Pro5M = "pro_5m";
    case Enterprise = "enterprise";
}
