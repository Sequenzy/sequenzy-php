<?php

namespace Sequenzy\LandingPages\Types;

enum CreateLandingPagesRequestTemplate: string
{
    case FromScratch = "from-scratch";
    case Waitlist = "waitlist";
    case LeadMagnet = "lead-magnet";
    case Launch = "launch";
    case DemoRequest = "demo-request";
    case Webinar = "webinar";
    case Newsletter = "newsletter";
    case ProductHunt = "product-hunt";
    case PricingOffer = "pricing-offer";
    case AgencyLeadGen = "agency-lead-gen";
    case FeatureAnnouncement = "feature-announcement";
}
