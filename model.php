<?php

class ArticleModel {
    public int $id;
    public string $title;
    public DateTime $date_time;
    public string $url;

    function new() {
        echo "teste!";
    }
}