<?php

declare(strict_types=1);

namespace App\Service\Search\Elasticsearch\QueryTemplate;

use RuntimeException;

class TemplateProcessingException extends RuntimeException
{
    public static function failToGetTemplateContent(string $templateName, string $error): self
    {
        $message = sprintf('Fail to get template content. Template: %s. Error: %s', $templateName, $error);

        return new self($message);
    }

    public static function incorrectJsonFormat($templateName): self
    {
        $message = sprintf('Incorrect json format. Template: %s', $templateName);

        return new self($message);
    }
}
