<?php

namespace Sequenzy\Types;

enum TrackingSettingsReplyTrackingInboundReplyDomainMode: string
{
    case Sequenzy = "sequenzy";
    case Custom = "custom";
}
