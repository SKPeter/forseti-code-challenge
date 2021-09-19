<?php

require "environment.php";
require "scraper.php";
require "model.php";

function fetchRoutine() {
    $scraper = new Scraper();
    $url = "https://www.gov.br/compras/pt-br/acesso-a-informacao/noticias?b_start:int=";
    $data = $scraper->fetch($url, 30, 5);

    foreach ($data as $item) {
        $url_hash = md5($item["url"]);
        $exists = ArticleModel::find(["url_hash" => $url_hash]);            
        if (count($exists) > 0) continue;
        
        $article = new ArticleModel();
        $article->title = $item["title"];
        $article->date_time = $item["date_time"];
        $article->url = $item["url"];
        $article->url_hash = $url_hash;
        $article->save();
    }
}

function getArticles() {
    return ArticleModel::find();
}

$params = [];
parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['mode']) && $params['mode'] == "fetch") {
    fetchRoutine();
}
$articles = getArticles();

include "view.php";
