<?php

namespace Sequenzy\EmailSends\Types;

enum GetEmailSendsResponseSource: string
{
    case Database = "database";
    case ClickhouseEvents = "clickhouse_events";
}
