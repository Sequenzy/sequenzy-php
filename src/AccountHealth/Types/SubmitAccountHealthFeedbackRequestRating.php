<?php

namespace Sequenzy\AccountHealth\Types;

enum SubmitAccountHealthFeedbackRequestRating: string
{
    case Useful = "useful";
    case NotUseful = "not_useful";
}
