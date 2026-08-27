<?php

namespace Sequenzy\AbTests\Types;

enum RestartAbTestsRequestTestType: string
{
    case Subject = "subject";
    case Content = "content";
}
