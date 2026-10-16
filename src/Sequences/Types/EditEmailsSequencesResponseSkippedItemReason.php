<?php

namespace Sequenzy\Sequences\Types;

enum EditEmailsSequencesResponseSkippedItemReason: string
{
    case AbTest = "ab_test";
    case NoEmail = "no_email";
    case SharedEmail = "shared_email";
}
