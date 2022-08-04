<?php

namespace App\Providers;

use App\Lib\Api\V1\Converters\ConverterInterface;
use App\Lib\Api\V1\Converters\JsonResponseConverter;
use App\Lib\Api\V1\Converters\XmlConverter;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ConverterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ConverterInterface::class,
            function () {
                $request = $this->app->make(Request::class);
                $format = $request->format ?? "json";
                if ($format === "xml") {
                    return new XmlConverter();
                } else {
                    return new JsonResponseConverter();
                }
            }
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
