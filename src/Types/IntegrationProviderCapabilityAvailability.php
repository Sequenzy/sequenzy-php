<?php

namespace Sequenzy\Types;

enum IntegrationProviderCapabilityAvailability: string
{
    case Available = "available";
    case Beta = "beta";
    case ComingSoon = "coming_soon";
}
