<?php

namespace App\Application\UseCase\CreateNews;

use App\Application\Source\SourceInterface;
use App\Domain\Factory\NewsFactoryInterface;
use App\Domain\Repository\NewsRepositoryInterface;

class CreateNewsUseCase
{
    public function __construct(
        private readonly NewsFactoryInterface    $newsFactory,
        private readonly NewsRepositoryInterface $newsRepository,
    )
    {
    }

    public function __invoke(CreateNewsRequest $request): CreateNewsResponse
    {
        // создать новость
        $news = $this->newsFactory->create($request->url, $request->title);

        // Сохранить новость в базу
        $this->newsRepository->save($news);

        // Вернуть результат
        return new CreateNewsResponse(
            $news->getId(),
            $news->getDate(),
        );

    }
}
