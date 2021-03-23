<?php

namespace Askvortsov\FlarumAzure;

use League\Flysystem\AzureBlobStorage\AzureBlobStorageAdapter as LeagueAzureBlobStorageAdapter;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class AzureBlobStorageAdapter extends LeagueAzureBlobStorageAdapter
{

    /**
     * @var BlobRestProxy
     */
    private $client;

    private $container;

    private $maxResultsForContentsListing = 5000;

    public function __construct(BlobRestProxy $client, $container, $prefix = null)
    {
        parent::__construct($client, $container, $prefix);

        $this->client = $client;
        $this->container = $container;
        $this->setPathPrefix($prefix);
    }

    /**
     * Get the file URL by given path.
     *
     * @param  string $path Path.
     *
     * @return string
     */
    public function getUrl(string $path)
    {
        if ($this->url) {
            return rtrim($this->url, '/') . '/' . ($this->container === '$root' ? '' : $this->container . '/') . ltrim($path, '/');
        }
        return $this->client->getBlobUrl($this->container, $path);
    }
}