<?php declare(strict_types=1);


namespace App\Lib\Api\V1\Converters;

use Illuminate\Http\JsonResponse;
use Spatie\ArrayToXml\ArrayToXml;

class XmlConverter implements ConverterInterface
{
    public function convert(array $array): string
    {
        //checking if array is numeric for correct working ArrayToXml converter
        if (isset($array[0])) {
            $arrayToXml = new ArrayToXml(['racer' => $array]);
            $result = $arrayToXml->toXml();
        } else {
            $arrayToXml = new ArrayToXml($array);
            $result = $arrayToXml->toXml();
        }

        return $result;
    }
}
