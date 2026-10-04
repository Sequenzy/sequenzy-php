<?php

namespace Sequenzy\Types;

enum EmailCheckIssueCategory: string
{
    case Subject = "subject";
    case Preview = "preview";
    case Content = "content";
}
