<?php

namespace Sequenzy\Types;

enum FilterLeafField: string
{
    case Status = "status";
    case Phone = "phone";
    case SmsStatus = "smsStatus";
    case Tag = "tag";
    case Email = "email";
    case EmailProvider = "emailProvider";
    case Added = "added";
    case FirstName = "firstName";
    case LastName = "lastName";
    case List_ = "list";
    case Attribute = "attribute";
    case Event = "event";
    case Segment = "segment";
    case StripeProduct = "stripeProduct";
    case StripeCurrentProduct = "stripeCurrentProduct";
    case StripeTrialProduct = "stripeTrialProduct";
    case CommerceProduct = "commerceProduct";
    case CommerceCollection = "commerceCollection";
    case EmailSent = "emailSent";
    case EmailDelivered = "emailDelivered";
    case EmailOpened = "emailOpened";
    case EmailClicked = "emailClicked";
    case EmailBounced = "emailBounced";
    case EmailComplained = "emailComplained";
}
