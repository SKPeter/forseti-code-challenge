<?php 

class Scraper {
    function fetch($url,$perPage,$numPages = 1) {
        $articles = [];
        for($page=0; $page<$numPages; $page++) {
            $start = $perPage*$page;
            $page = file_get_contents('https://www.gov.br/compras/pt-br/acesso-a-informacao/noticias?b_start:int='.$start);
            $dom = new DOMDocument();
            @$dom->loadHTML($page);
            $articleNodes = $dom->getElementById("content-core")->getElementsByTagName("article");
            
            foreach ($articleNodes as $article) {
                //Get raw data
                $title = $article->getElementsByTagName("h2")[0];
                $url = $title->getElementsByTagName("a")[0];
                $articleAttributes = $article->getElementsByTagName("span");

                //Process raw data to get necessary info.
                $title = trim($title->textContent);
                $url = trim($url->getAttribute("href"));
                $date = null;
                $time = null;

                //Get date and time information out of articleData
                foreach ($articleAttributes as $attr) {
                    $attrText = trim($attr->textContent);
                    if (preg_match("/([0-9]*)[\/]([0-9]*)[\/]([0-9]*)/", $attrText, $match))
                        $date = $match[0];
                    if (preg_match("/([0-9]*)[h]([0-9]*)/", $attrText, $match))
                        $time = $match[0];
                }

                //Format date and time to fit database standards
                $date_time = $this->convertDateTimeFromPortugueseToISO($date, $time);
                

                $articles[] = [
                    "title" => $title,
                    "url" => $url,
                    "date_time" => $date_time,
                ];
            }
        }
        return $articles;
    }

    function convertDateTimeFromPortugueseToISO($date, $time = null) {
        $date = implode('-', array_reverse(explode('/', $date)));
        if ($time) $time = str_replace("h", ":", $time) . ":00";
        return $date . " " . $time;
    }
}