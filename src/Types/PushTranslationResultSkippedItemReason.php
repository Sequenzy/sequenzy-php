<?php

namespace Sequenzy\Types;

enum PushTranslationResultSkippedItemReason: string
{
    case UpToDate = "up_to_date";
    case Edited = "edited";
}
