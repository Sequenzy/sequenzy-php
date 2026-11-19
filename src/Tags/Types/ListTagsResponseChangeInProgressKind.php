<?php

namespace Sequenzy\Tags\Types;

enum ListTagsResponseChangeInProgressKind: string
{
    case Rename = "rename";
    case Merge = "merge";
}
