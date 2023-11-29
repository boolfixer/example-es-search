<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch\QueryBuilder;

use App\Service\Search\Elasticsearch\SearchParametersInterface;
use Elastica\Query;

interface QueryBuilderInterface
{
    public function createSearchQuery(string $templateName, SearchParametersInterface $searchParameters): Query;
}
