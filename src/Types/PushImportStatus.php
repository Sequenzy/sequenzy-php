<?php

namespace Sequenzy\Types;

enum PushImportStatus: string
{
    case Draft = "draft";
    case Queued = "queued";
    case Exporting = "exporting";
    case Importing = "importing";
    case Completed = "completed";
    case Failed = "failed";
    case Canceled = "canceled";
}
