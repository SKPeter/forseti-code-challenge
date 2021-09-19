<?php

class ArticleModel {
    public int $id;
    public string $title;
    public string $date_time;
    public string $url;
    public string $url_hash;

    /**
     * Find one or many articles on the database using parameters
     **/
    static function find(array $parameters = []) {        
        $pdo = new PDO("mysql:dbname=".DB_NAME.";host=localhost", DB_USERNAME, DB_PASSWORD);
        $conditions = [];
        foreach ($parameters as $parameter => $value) {
            if (is_array($value)) $parameter . " IN ('" . implode("','", $value) . "')";
            else $conditions[] = $parameter . " = '" . $value . "'";
        }
        if (count($conditions)) $conditions = " WHERE " . implode(" AND ", $conditions);
        else $conditions = "";

        $query = $pdo->query("
            SELECT `id`, `title`, DATE_FORMAT(`date_time`, '%d/%m/%y %H:%i') as `date_time`, `url`, `url_hash` FROM news
            " . $conditions . "
        ");

        return $query->fetchAll();
    }

    /**
     * Save instance of article into database
     **/
    function save() {
        if (!$this->title || !$this->date_time || !$this->url) return false;
        if (!$this->url_hash) $this->url_hash = md5($this->url);

        $pdo = new PDO("mysql:dbname=".DB_NAME.";host=localhost", DB_USERNAME, DB_PASSWORD);
        if (!isset($this->id)) {
            $query = $pdo->prepare("
                INSERT INTO `news` (`title`, `date_time`, `url`, `url_hash`)
                VALUES (:title, :date_time, :url, :url_hash);
            ");
        }
        try {
            $result = $query->execute([
                'title' => $this->title,
                'date_time' => $this->date_time,
                'url' => $this->url,
                'url_hash' => $this->url_hash,
            ]);            
        }
        catch (PDOException $e) {
            echo "<b>Error when adding news entry</b> - " . $e->getMessage();
            return false;
        }
        
        return $result;
    }
}