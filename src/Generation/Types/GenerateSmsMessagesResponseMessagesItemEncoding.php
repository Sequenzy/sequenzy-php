<?php

namespace Sequenzy\Generation\Types;

enum GenerateSmsMessagesResponseMessagesItemEncoding: string
{
    case Gsm7 = "gsm7";
    case Ucs2 = "ucs2";
}
