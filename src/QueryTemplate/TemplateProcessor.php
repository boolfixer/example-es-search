<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch\QueryTemplate;

use JsonException;
use Twig\Environment;
use Twig\Error\Error;

class TemplateProcessor implements TemplateProcessorInterface
{
    public function __construct(private readonly Environment $twig)
    {
    }

    public function process(string $templateName, array $variables): array
    {
        try {
            $templateContent = $this->twig->render($templateName, $variables);

            /**
             * Remove comma before end bracket of array `, ]` to transform string to valid json format.
             */
            $templateContent = preg_replace('/\s*,\s*]/', ']', $templateContent);

            return json_decode($templateContent, true, flags: JSON_THROW_ON_ERROR);
        } catch (Error $error) {
            throw TemplateProcessingException::failToGetTemplateContent($templateName, $error->getMessage());
        } catch (JsonException) {
            throw TemplateProcessingException::incorrectJsonFormat($templateName);
        }
    }
}
