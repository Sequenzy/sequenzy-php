<?php

namespace Sequenzy\Types;

enum TemplateLocalizationStatus: string
{
    case Synced = "synced";
    case Stale = "stale";
    case Syncing = "syncing";
    case Failed = "failed";
}
