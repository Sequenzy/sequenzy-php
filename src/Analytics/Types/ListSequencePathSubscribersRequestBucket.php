<?php

namespace Sequenzy\Analytics\Types;

enum ListSequencePathSubscribersRequestBucket: string
{
    case Unmapped = "unmapped";
    case Unrecorded = "unrecorded";
}
