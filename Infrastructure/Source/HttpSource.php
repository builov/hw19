<?php

namespace App\Infrastructure\Source;

use App\Application\Source\SourceRequest;
use App\Application\Source\SourceInterface;
use App\Application\Source\SourceResponse;
use App\Application\UseCase\CreateNews\CreateNewsRequest;

class HttpSource implements SourceInterface
{
    public function create(SourceRequest $request): CreateNewsRequest
    {
        $html = file_get_contents($request->url);

        preg_match('|<title[^>]*?>(.*?)</title>|si', $html,$result);
        $title = $result[1];

        return new CreateNewsRequest($request->url, $title);
    }
}