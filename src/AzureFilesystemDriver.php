<?php

namespace Askvortsov\FlarumAzure;

use Flarum\Filesystem\DriverInterface;
use Flarum\Foundation\Config;
use Flarum\Settings\SettingsRepositoryInterface;
use League\Flysystem\Filesystem;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class AzureFilesystemDriver implements DriverInterface
{
    public function build(string $diskName, SettingsRepositoryInterface $settings, Config $config, array $localConfig): Filesystem
    {
        $accountName = $config['azure-config'][$diskName]['accountName'];
        $accountKey = $config['azure-config'][$diskName]['accountKey'];
        $containerName = $config['azure-config'][$diskName]['containerName'];
        $client = BlobRestProxy::createBlobService("DefaultEndpointsProtocol=https;AccountName=$accountName;AccountKey=$accountKey;EndpointSuffix=core.windows.net;");
        $adapter = new AzureBlobStorageAdapter($client, $containerName);
        return new Filesystem($adapter);
    }
}
