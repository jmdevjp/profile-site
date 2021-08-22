<?php

class Article
{
    public $id;
    public $title;
    public $created_date;
    public $summary;
    public $body;

    public function __construct($id, $title, $created_date, $summary, $body)
    {
        $this->id = $id;
        $this->title = $title;
        $this->created_date = $created_date;
        $this->summary = $summary;
        $this->body = $body;
    }

    public function toArray(): array
    {
        return [
            $this->id,
            $this->title,
            $this->created_date,
            $this->summary,
            $this->body
        ];
    }
}

class BlogData
{
    public array $articles = [];

    private const ARTICLE_COLUMN_SIZE  = 5;
    private const DB_FILE = './data/database.csv';

    public function load()
    {
        $file = new SplFileObject(self::DB_FILE, "r");
        $file->setFlags(SplFileObject::READ_CSV);

        foreach ($file as $line)
        {
            if (count($line) == self::ARTICLE_COLUMN_SIZE)
            {
                $this->articles[] = new Article(
                    $line[0],
                    $line[1],
                    $line[2],
                    $line[3],
                    $line[4]
                );
            }
        }

        $file = null;
    }

    public function getArticleById($id): Article
    {
        foreach ($this->articles as $article)
        {
            if ($article->id === $id)
            {
                return $article;
            }
        }
    }

    public function addArticle($title, $created_date, $summary, $body)
    {
        $new_id = count($this->articles);
        array_unshift($this->articles, new Article($new_id, $title, $created_date, $summary, $body));

        $file = new SplFileObject(self::DB_FILE, "c+");
        $file->setFlags(SplFileObject::READ_CSV);
        $file->fseek(0);

        foreach ($this->articles as $v) {
            $file->fputcsv($v->toArray());
        }

        $file = null;
    }

    public function updateArticle($id, $title, $summary, $body)
    {
        foreach ($this->articles as $article)
        {
            if ($article->id === $id)
            {
                $article->title = $title;
                $article->summary = $summary;
                $article->body = $body;
            }
        }

        $file = new SplFileObject(self::DB_FILE, "c+");
        $file->setFlags(SplFileObject::READ_CSV);
        $file->fseek(0);

        foreach ($this->articles as $article) {
            $file->fputcsv($article->toArray());
        }

        $file = null;
    }
}
