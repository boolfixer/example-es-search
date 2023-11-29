<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch;

use App\Service\Search\Elasticsearch\QueryBuilder\QueryBuilderInterface;
use Elastica\Client;
use Elastica\ResultSet;
use Elastica\Search;

class SearchEngine implements SearchEngineInterface
{
    public function __construct(
        private readonly Client $client,
        private readonly QueryBuilderInterface $queryBuilder,
        private readonly string $esIndexAliasOrder
    ) {
    }

    public function search(string $templateName, SearchParametersInterface $searchParameters): ResultSet
    {
        $query = $this->queryBuilder->createSearchQuery($templateName, $searchParameters);

        $search = new Search($this->client);
        $search->addIndex($this->esIndexAliasOrder);

        return $search->search($query);
    }
}
