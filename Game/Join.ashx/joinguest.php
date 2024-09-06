$joinscript = [
        "ClientPort" => 0,
        "MachineAddress" => $ip,
        "ServerPort" => $port,
        "PingUrl" => "",
        "PingInterval" => 30,
        "UserName" => $username,
        "SeleniumTestMode" => false,
        "UserId" => $userid,
        "SuperSafeChat" => false,
        "CharacterAppearance" => $charapp,
        "ClientTicket" => authticket($userid, $username, $charapp, $jobid),
        "GameId" => $jobid,
        "PlaceId" => $gameid,
        "MeasurementUrl" => "",
        "WaitingForCharacterGuid" => "26eb3e21-aa80-475b-a777-b43c3ea5f7d2",
        "BaseUrl" => "https://www.ace.ct8.p/",
        "ChatStyle" => "ClassicAndBubble",
        "VendorId" => "0",
        "ScreenShotInfo" => "",
        "VideoInfo" => "",
        "CreatorId" => $creatorid,
        "CreatorTypeEnum" => "User",
        "MembershipType" => $membership == "" ? "None" : $membership,
        "AccountAge" => $accountAge,
        "CookieStoreFirstTimePlayKey" => "rbx_evt_ftp",
        "CookieStoreFiveMinutePlayKey" => "rbx_evt_fmp",
        "CookieStoreEnabled" => true,
        "IsRobloxPlace" => false,
        "GenerateTeleportJoin" => false,
        "IsUnknownOrUnder13" => false,
        "SessionId" => "",
        "DataCenterId" => 0,
        "UniverseId" => $gameid,
        "BrowserTrackerId" => 0,
        "UsePortraitMode" => false,
        "FollowUserId" => 0,
        "characterAppearanceId" => 0,
    ];

    $data = json_encode($joinscript, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    exit(Utility::sign($data));
function sign($script)
    {
        $script = "\r\n" . $script;
        $signature = "";
        $key = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/config/PrivateKey/PrivateKey.pem');
        openssl_sign($script, $signature, $key, OPENSSL_ALGO_SHA1);
        return "--rbxsig" . sprintf("%%%s%%%s", base64_encode($signature), $script);
    }