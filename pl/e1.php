<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="referrer" content="no-referrer">
    <style>
        body {
            cursor: url(https://i.imgur.com/TQqwfCx.png), auto;
            background: #000;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }

        .container {
            width: 100% !important;
            height: 100vh !important;
        }

        #player {
            height: 100% !important;
            width: 100% !important;
        }

        .hidden {
            position: absolute;
            left: -9999px;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        .error-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ff0000;
            font-size: 20px;
            text-align: center;
            z-index: 9999;
        }

        #soundFrame {
            position: absolute;
            width: 0;
            height: 0;
            border: none;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/level-selector@latest/dist/level-selector.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clappr-pip@latest/dist/clappr-pip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/clappr/dash-shaka-playback@latest/dist/dash-shaka-playback.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clappr-chromecast-plugin@latest/dist/clappr-chromecast-plugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/clappr-pip@latest/dist/clappr-pip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/disable-devtool/disable-devtool.min.js" disable-devtool-auto></script>
</head>

<body>
    <?php
    $allowed_domains = array("bigwbita.xyz", "iframetester.com");
    $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $allowed = false;
    foreach ($allowed_domains as $domain) {
        if (strpos($referrer, $domain) !== false) {
            $allowed = true;
            break;
        }
    }
    if (!$allowed) {
        http_response_code(404);
        include('404.html');
        exit;
    }
    ?>
    <div class="container">
        <div id="player"></div>
    </div>
    <script>
        var player = new Clappr.Player({
            source: "https://n-16-19.dcs.redcdn.pl/livedash/o2/tvnplayer/live/eurosport/live.isml/playlist.mpd?indexMode=&dummyfile=&server_side_events=0&dvr=7200000",
            plugins: [LevelSelector, DashShakaPlayback],
            shakaConfiguration: {
                drm: {
                    clearKeys: {
                      "1c167eea914f456e1dc4b9dbf18cbfa0": "7f013f5750a75e4a9282eb0fdd031eac"
                    }
                }
            },
            autoPlay: true,
            muted: false,
            width: "100%",
            height: "100%",
            poster: "https://wykop.pl/cdn/c3201142/39bf786a9ada8033aaaa16cbae7e6e01e378cd813ba64cff0f0601c5c93128ab.jpg",
            watermark: "",
            parentId: "#player",
            mediacontrol: {
                seekbar: "#de0161",
                buttons: "#de0161"
            }
        });
    </script>
</body>
</html>
