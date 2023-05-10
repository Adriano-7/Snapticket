<?php
declare(strict_types=1);
class File{
    public int $file_id;
    public string $file_name;
    public string $date;
    public string $file_type;
    public string $content;

    public function __construct(int $file_id, string $file_name, string $date, string $file_type, string $content)
    {
        $this->file_id = $file_id;
        $this->file_name = $file_name;
        $this->date = $date;
        $this->file_type = $file_type;
        $this->content = $content;
    }
    static function getFile(PDO $db, int  $file_id): ?File{
        $query = $db->prepare("SELECT * FROM File WHERE file_id = ?");
        $query->execute(array($file_id));
        $file = NULL;

        if($row = $query->fetch()){
            $file = new File($row['file_id'], $row['file_name'], $row['date'], $row['file_type'], $row['content']);
        }
        return $file;
    }
}
?>