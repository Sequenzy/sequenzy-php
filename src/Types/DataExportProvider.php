<?php

namespace Sequenzy\Types;

enum DataExportProvider: string
{
    case S3 = "s3";
    case Gcs = "gcs";
}
