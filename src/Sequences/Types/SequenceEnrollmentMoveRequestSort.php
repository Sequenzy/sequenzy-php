<?php

namespace Sequenzy\Sequences\Types;

enum SequenceEnrollmentMoveRequestSort: string
{
    case WaitUntilAsc = "wait_until_asc";
    case WaitUntilDesc = "wait_until_desc";
    case EnrolledAtAsc = "enrolled_at_asc";
    case EnrolledAtDesc = "enrolled_at_desc";
}
