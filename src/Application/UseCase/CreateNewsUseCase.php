<?php

namespace Builov\Hw19\Application\UseCase;

use Builov\Hw19\Domain\ValueObject\NewsUrl;

class CreateNewsUseCase
{
    public function __invoke(NewsUrl $url): void
    {
        // Получить новость по url
        // Создать новость
        // Сохранить новость в БД
        // Вернуть результат
    }
}