<?php declare(strict_types=1);

namespace App\Lib\Api\V1\Converters;

use Illuminate\Http\JsonResponse;

interface ConverterInterface
{
    public function convert(array $array): JsonResponse|string;
}
