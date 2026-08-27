<?php

namespace Sequenzy\Types;

enum SubscriberImportStatus: string
{
    case Running = "running";
    case Completed = "completed";
}
