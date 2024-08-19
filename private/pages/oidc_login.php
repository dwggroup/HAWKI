<?php

// use library for dealing with OpenID connect
require PRIVATE_PATH . '/vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

if (file_exists(ENV_FILE_PATH)){
    $env = parse_ini_file(ENV_FILE_PATH);
}

// Create OpenID connect client

$oidc = new OpenIDConnectClient(
    isset($env) ? $env["OIDC_IDP"] : getenv("OIDC_IDP"),
    isset($env) ? $env["OIDC_CLIENT_ID"] : getenv("OIDC_CLIENT_ID"),
    isset($env) ? $env["OIDC_CLIENT_SECRET"] : getenv("OIDC_CLIENT_SECRET")
);

$oidcProxy = isset($env) ? $env["OIDC_PROXY"] : getenv("OIDC_PROXY");
if (isset($oidcProxy)) {
    $oidc->setHttpProxy($oidcProxy);
}

# Demo is dealing with HTTP rather than HTTPS
$testuser = isset($env) ? $env["TESTUSER"] : getenv("TESTUSER");
if ($testuser) {
    $oidc->setHttpUpgradeInsecureRequests(false);
}

$oidc_scopes = isset($env) ? $env["OIDC_SCOPES"] : getenv("OIDC_SCOPES");
if (isset($oidc_scopes)) {
    $oidc_scopes = explode(' ', $oidc_scopes);
} else {
    $oidc_scopes = array('openid','profile','email');
}
$oidc->addScope($oidc_scopes);
$oidc->authenticate();

function set_oidc_uik_to_session($userinfo, $env, $envKey, $sessionKey) {
    $key = isset($env) ? $env[$envKey] : getenv($envKey);
    if (isset($key)) {
        $_SESSION[$sessionKey] = $userinfo->{$key};
    }

    $key = $sessionKey;
    if (isset($userinfo->{$key})) {
        $_SESSION[$sessionKey] = $userinfo->{$key};
    }
}

$userinfo = $oidc->requestUserInfo();
$_SESSION['userinfo'] = $userinfo;
$_SESSION['username'] = $userinfo->sub;
set_oidc_uik_to_session($userinfo, $env, "OIDC_UIK_SUB", "sub");
set_oidc_uik_to_session($userinfo, $env, "OIDC_UIK_NAME", "name");
set_oidc_uik_to_session($userinfo, $env, "OIDC_UIK_GIVEN_NAME", "given_name");
set_oidc_uik_to_session($userinfo, $env, "OIDC_UIK_FAMILY_NAME", "family_name");
set_oidc_uik_to_session($userinfo, $env, "OIDC_UIK_EMAIL", "email");

header("Location: interface");
exit();

?>
