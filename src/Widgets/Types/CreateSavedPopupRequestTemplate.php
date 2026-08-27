<?php

namespace Sequenzy\Widgets\Types;

enum CreateSavedPopupRequestTemplate: string
{
    case NewsletterModal = "newsletter-modal";
    case DiscountOffer = "discount-offer";
    case CountdownLaunch = "countdown-launch";
    case MinimalSlideIn = "minimal-slide-in";
    case ExitLeadMagnet = "exit-lead-magnet";
    case LiveDemo = "live-demo";
    case LaunchModal = "launch-modal";
    case PaperDigest = "paper-digest";
    case StarkTakeover = "stark-takeover";
    case TopBar = "top-bar";
    case AnnouncementBar = "announcement-bar";
    case FullscreenWelcome = "fullscreen-welcome";
}
