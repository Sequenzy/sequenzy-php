<?php

namespace Sequenzy\Types;

enum SubscriberActivityEventEngagementQuality: string
{
    case Human = "human";
    case Machine = "machine";
    case Asset = "asset";
}
