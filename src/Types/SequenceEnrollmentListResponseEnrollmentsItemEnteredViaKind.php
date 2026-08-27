<?php

namespace Sequenzy\Types;

enum SequenceEnrollmentListResponseEnrollmentsItemEnteredViaKind: string
{
    case List_ = "list";
    case Tag = "tag";
    case Segment = "segment";
    case Event = "event";
    case Inactivity = "inactivity";
    case Frequency = "frequency";
    case Manual = "manual";
    case TestRun = "test_run";
    case Unknown = "unknown";
}
