<?php

namespace Sequenzy\Types;

enum WarehouseConnectionProvider: string
{
    case Snowflake = "snowflake";
    case Bigquery = "bigquery";
    case Redshift = "redshift";
    case Postgres = "postgres";
}
