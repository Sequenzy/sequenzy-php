<?php

namespace Sequenzy\Types;

enum SequenceInboundWebhookMappingCheckStatus: string
{
    case Ok = "ok";
    case EmailNotFound = "email_not_found";
    case NoSample = "no_sample";
}
