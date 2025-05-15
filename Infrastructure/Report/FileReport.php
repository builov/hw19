<?php

namespace App\Infrastructure\Report;

use App\Application\Report\ReportInterface;

class FileReport implements ReportInterface
{
    public function create(iterable $news): string
    {
        $html = '';

        foreach ($news as $item) {
            $html .= '<li><a href="' . $item['url'] . '">' . $item['title'] . '</a></li>';
        }

        $html = '<html lang="ru"><body><ul>' . $html . '</ul></body></html>';

        $fileName = 'report-' . time() . '.html';

        file_put_contents($fileName, $html, LOCK_EX);

        return $fileName;
    }
}