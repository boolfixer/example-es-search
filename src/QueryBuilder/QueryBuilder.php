<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch\QueryBuilder;

use App\Service\Search\Elasticsearch\QueryTemplate\TemplateProcessorInterface;
use App\Service\Search\Elasticsearch\SearchParametersInterface;
use Elastica\Query;

class QueryBuilder implements QueryBuilderInterface
{
    public function __construct(private readonly TemplateProcessorInterface $templateProcessor)
    {
    }

    public function createSearchQuery(string $templateName, SearchParametersInterface $searchParameters): Query
    {
        $query = $this->templateProcessor->process(
            $templateName,
            $searchParameters->toTemplateParameters()
        );

        return Query::create($query);
    }
}
