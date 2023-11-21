<?php

require_once 'vendor/autoload.php'; // Composerのオートローダーをロード

use NFC\NFC;
use NFC\NFCReader;

$nfc = new NFC();
$reader = $nfc->getReader();
$devices = $reader->listDevices();

if (count($devices) > 0) {
    $device = $devices[0];
    $device->open();

    $tag = $reader->initiatorInit();
    $tag->setTimeout(500); // タイムアウトの設定

    while (true) {
        $tag->poll();

        if ($tag->isPresent()) {
            $idm = $tag->getTargetID();
            echo "FeliCaが検出されました。IDm: $idm\n";
            // ここでFeliCaのデータを処理する

            // 例: FeliCaのIDmを元にデータベースを検索するなどの処理を追加

            break;
        }
    }

    $device->close();
} else {
    echo "NFCデバイスが見つかりませんでした。\n";
}