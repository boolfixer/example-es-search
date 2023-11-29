<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch;

interface SearchParametersInterface
{
    public function toTemplateParameters(): array;
}
