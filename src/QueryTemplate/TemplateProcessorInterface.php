<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch\QueryTemplate;

interface TemplateProcessorInterface
{
    public function process(string $templateName, array $variables): array;
}
