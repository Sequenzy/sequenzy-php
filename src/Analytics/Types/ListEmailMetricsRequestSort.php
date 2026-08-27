<?php

namespace Sequenzy\Analytics\Types;

enum ListEmailMetricsRequestSort: string
{
    case Sent = "sent";
    case Delivered = "delivered";
    case Opened = "opened";
    case Clicked = "clicked";
    case OpenRate = "openRate";
    case ClickRate = "clickRate";
    case Unsubscribed = "unsubscribed";
    case Conversions = "conversions";
    case Revenue = "revenue";
    case Step = "step";
    case Name = "name";
}
