<?php

namespace App\Application\UseCase\getNews;

use App\Application\Db\SelectNewsResponse;
use App\Domain\Repository\NewsRepositoryInterface;

class GetAllNewsUseCase
{
    public function __construct(
        private readonly NewsRepositoryInterface $newsRepository,
    )
    {
    }

    public function __invoke(): GetNewsResponse
    {
        $news = $this->newsRepository->findAll();

        $result = [];

        foreach ($news as $item) {
            $result[] = [
                'ID' => $item['id'],
                'date' => $item['created'],
                'url' => $item['url'],
                'title' => $item['title'],
            ];
        }

        return new GetNewsResponse($result);
    }
}