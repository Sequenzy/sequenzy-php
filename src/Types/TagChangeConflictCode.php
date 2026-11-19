<?php

namespace Sequenzy\Types;

enum TagChangeConflictCode: string
{
    case TagNameTaken = "tag_name_taken";
    case TagInUse = "tag_in_use";
    case TagChanged = "tag_changed";
    case TagInProgress = "tag_in_progress";
}
