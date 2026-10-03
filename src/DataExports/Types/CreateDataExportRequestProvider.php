<?php

namespace Sequenzy\DataExports\Types;

enum CreateDataExportRequestProvider: string
{
    case S3 = "s3";
    case Gcs = "gcs";
}
