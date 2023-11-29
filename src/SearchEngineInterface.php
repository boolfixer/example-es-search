<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch;

use Elastica\ResultSet;

interface SearchEngineInterface
{
    public function search(string $templateName, SearchParametersInterface $searchParameters): ResultSet;
}
