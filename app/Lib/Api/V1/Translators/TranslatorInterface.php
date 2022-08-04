<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Translators;

interface TranslatorInterface
{
    public function translate(array $array): array;
}
