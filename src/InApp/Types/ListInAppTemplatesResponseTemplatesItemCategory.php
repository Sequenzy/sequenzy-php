<?php

namespace Sequenzy\InApp\Types;

enum ListInAppTemplatesResponseTemplatesItemCategory: string
{
    case Conversion = "Conversion";
    case Onboarding = "Onboarding";
    case Announcement = "Announcement";
    case Engagement = "Engagement";
}
