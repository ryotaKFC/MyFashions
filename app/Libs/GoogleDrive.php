<?php

namespace App\Libs;

use App\Models\Fashion;

class GoogleDrive
{
    /**
     * Googleドライブへの認証を行う
     * @return \Google_Service_Drive
     */
    public function getDriveClient(): \Google_Service_Drive
    {
        $client = new \Google_Client();

        // サービスアカウント作成時にダウンロードしたJSONファイルの名前を「client_secret」変更し、configフォルダ内に設置
        $client->setAuthConfig(config_path('client_secret.json'));
        $client->setScopes(['https://www.googleapis.com/auth/drive']);

        return new \Google_Service_Drive($client);
    }

    /**
     * ファイルをアップロードする
     *
     * @return GoogleDrive
     */
    public function fileUpload(Fashion $fashion)
    {
        $driveClient = $this->getDriveClient();

        $fileMetadata = new \Google_Service_Drive_DriveFile([
            'name' => "{$fashion->user_id}_{$fashion->id}.jpg", // Googleドライブへアップロードされた際のファイル名（今回は「sample.jpg」とする）
            'parents' => ['1tLETNQqXMJUjV72UDMQKfJq0MdEXSwHN'], // 保存先のフォルダID（配列で渡さなければならないので注意）
        ]);

        $driveClient->files->create($fileMetadata, [
            'data' => file_get_contents(storage_path('app/public/sample.jpg')), // アップロード対象となるファイルのパス（今回はstorage/app/public配下の「sample.jpg」を指定）
            'mimeType' => ' image/jpeg',
            'uploadType' => 'media',
            'fields' => 'id',
        ]);
    }
}
