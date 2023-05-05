<?php
declare(strict_types=1);
class File{
    public string $file_id;
    public string $file_name;
    public string $date;
    public string $file_type;
    public string $ticket_id;
    public string $content;

    public function __construct(string $file_id, string $file_name, string $date, string $file_type, string $ticket_id, string $content)
    {
        $this->file_id = $file_id;
        $this->file_name = $file_name;
        $this->date = $date;
        $this->file_type = $file_type;
        $this->ticket_id = $ticket_id;
        $this->content = $content;
    }

    static function upload(PDO $db, string $file_name, string $date, string $file_type, string $ticket_id, string $content): bool
    {
        $query = $db->prepare('
            INSERT INTO File(file_name, date, file_type, ticket_id, content)
            VALUES (?, ?, ?, ?, ?)
        ');

        return $query->execute(array($file_name, $date, $file_type, $ticket_id, $content));
    }

    static function getFile(PDO $db, string  $id): ?string{
        $stmt = $db->prepare("SELECT content FROM File WHERE file_id = ?");
        $stmt->execute(array($id));
        $file = $stmt->fetch();
        return $file['content'];
    }

    static function showImage(PDO $db, int $file_id){
        $query = $db->prepare('
        SELECT content
        FROM File
        WHERE file_id = ?'
        );

        $query->execute(array($file_id));

        $file = $query->fetch();
        header('Content-Type: image/jpeg');
        echo $file;
    }
}
?>