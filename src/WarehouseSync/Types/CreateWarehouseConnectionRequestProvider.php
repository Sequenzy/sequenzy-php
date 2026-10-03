<?php

namespace Sequenzy\WarehouseSync\Types;

enum CreateWarehouseConnectionRequestProvider: string
{
    case Snowflake = "snowflake";
    case Bigquery = "bigquery";
    case Redshift = "redshift";
    case Postgres = "postgres";
}
