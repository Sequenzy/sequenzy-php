<?php

namespace Sequenzy\Types;

enum PushImportSource: string
{
    case Onesignal = "onesignal";
    case Braze = "braze";
    case CustomerIo = "customer_io";
    case Csv = "csv";
}
