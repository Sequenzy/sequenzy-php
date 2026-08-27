<?php

namespace Sequenzy\AbTests\Types;

enum CreateAbTestsRequestTestType: string
{
    case Subject = "subject";
    case Content = "content";
}
