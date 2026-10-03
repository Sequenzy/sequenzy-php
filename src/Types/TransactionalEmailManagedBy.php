<?php

namespace Sequenzy\Types;

enum TransactionalEmailManagedBy: string
{
    case Dashboard = "dashboard";
    case Code = "code";
}
