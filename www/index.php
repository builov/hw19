<?php

//phpinfo();

$url = filter_var('https://xn--80avpdf4e.xn--p1ai/', FILTER_SANITIZE_URL);

if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo 'VALID';
} else {
    throw new \InvalidArgumentException('Некорректный url');
}