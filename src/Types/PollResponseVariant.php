<?php

namespace Sequenzy\Types;

enum PollResponseVariant: string
{
    case Options = "options";
    case Nps = "nps";
}
