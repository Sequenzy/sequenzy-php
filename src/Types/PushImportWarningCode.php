<?php

namespace Sequenzy\Types;

enum PushImportWarningCode: string
{
    case IosNotConfigured = "ios_not_configured";
    case AndroidNotConfigured = "android_not_configured";
    case IosSandboxEnvironment = "ios_sandbox_environment";
    case CredentialsMustMatch = "credentials_must_match";
    case WebPushExcluded = "web_push_excluded";
}
