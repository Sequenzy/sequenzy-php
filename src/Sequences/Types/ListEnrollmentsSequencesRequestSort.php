<?php

namespace Sequenzy\Sequences\Types;

enum ListEnrollmentsSequencesRequestSort: string
{
    case EnrolledAtDesc = "enrolled_at_desc";
    case EnrolledAtAsc = "enrolled_at_asc";
    case WaitUntilAsc = "wait_until_asc";
    case WaitUntilDesc = "wait_until_desc";
}
