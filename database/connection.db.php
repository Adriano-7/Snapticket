<?php 
    declare(strict_types = 1);
    function connectToDatabase(): PDO {
        $db = new PDO('sqlite:' . __DIR__ . '/../database/database.db');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $db;
    }    
?>

<?php function insertClient(PDO $db, string $name, string $username, string $email, string $password, string $image_path){
    $statement = $db->prepare('INSERT INTO Client (name, username, email, password, user_image) VALUES (:name, :username, :email, :password, :user_image)');
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    if (empty($image_path)) {
        $image_data = 'default.jpg';
    } else {
        $image_data = file_get_contents($image_path);
    }
    $statement->bindParam(':user_image', $image_data, PDO::PARAM_LOB);
    $statement->execute();
}
?>

<?php function insertAgent(PDO $db, string $username){
    $statement = $db->prepare('INSERT INTO Agent (username) VALUES (:username)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertAdmin(PDO $db, string $username){
    $statement = $db->prepare('INSERT INTO Admin (username) VALUES (:username)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertDepartment(PDO $db, string $name){
    $statement = $db->prepare('INSERT INTO Department (name) VALUES (:name)');
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertHashtag(PDO $db, string $name){
    $statement = $db->prepare('INSERT INTO Hashtag (name) VALUES (:name)');
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertTicket(PDO $db, string $ticket_name, string $date, string $priority, string $assignee, string $status, string $username){
    $statement = $db->prepare('INSERT INTO Ticket (ticket_name, date, priority, assignee, status, username) VALUES (:ticket_name, :date, :priority, :assignee, :status, :username)');
    $statement->bindParam(':ticket_name', $ticket_name, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':priority', $priority, PDO::PARAM_STR);
    $statement->bindParam(':assignee', $assignee, PDO::PARAM_STR);
    $statement->bindParam(':status', $status, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertDepartmentTicket(PDO $db, string $name_department, int $ticket_id){
    $statement = $db->prepare('INSERT INTO DepartmentTicket (name_department, ticket_id) VALUES (:name_department, :ticket_id)');
    $statement->bindParam(':name_department', $name_department, PDO::PARAM_STR);
    $statement->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertTicketHashtag(PDO $db, int $ticket_id, string $name){
    $statement = $db->prepare('INSERT INTO TicketHashtag (ticket_id, name) VALUES (:ticket_id, :name)');
    $statement->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertComment(PDO $db, int $num, string $date, string $content, string $username, int $ticket_id){
    $statement = $db->prepare('INSERT INTO Comment (num, date, content, username, ticket_id) VALUES (:num, :date, :content, :username, :ticket_id)');
    $statement->bindParam(':num', $num, PDO::PARAM_INT);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQ(PDO $db, string $name_department){
    $statement = $db->prepare('INSERT INTO FAQ (name_department) VALUES (:name_department)');
    $statement->bindParam(':name_department', $name_department, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertQuestion(PDO $db, int $num, string $title, string $content, int $faq_id){
    $statement = $db->prepare('INSERT INTO Question (num, title, content, faq_id) VALUES (:num, :title, :content, :faq_id)');
    $statement->bindParam(':num', $num, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertAgentQuestion(PDO $db, string $username, int $quest_id){
    $statement = $db->prepare('INSERT INTO AgentQuestion (username, quest_id) VALUES (:username, :quest_id)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':quest_id', $quest_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertAnswer(PDO $db, int $num, string $content, int $quest_id){
    $statement = $db->prepare('INSERT INTO Answer (num, content, quest_id) VALUES (:num, :content, :quest_id)');
    $statement->bindParam(':num', $num, PDO::PARAM_INT);
    $statement->bindParam(':content', $content, PDO::PARAM_STR);
    $statement->bindParam(':quest_id', $quest_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertAgentAnswer(PDO $db, string $username, int $ans_id){
    $statement = $db->prepare('INSERT INTO AgentAnswer (username, ans_id) VALUES (:username, :ans_id)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':ans_id', $ans_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQHashtag(PDO $db, int $faq_id, string $name){
    $statement = $db->prepare('INSERT INTO FAQHashtag (faq_id, name) VALUES (:faq_id, :name)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertFAQDepartment(PDO $db, int $faq_id, string $name_department){
    $statement = $db->prepare('INSERT INTO FAQDepartment (faq_id, name_department) VALUES (:faq_id, :name_department)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':name_department', $name_department, PDO::PARAM_STR);
    $statement->execute();
}
?>

<?php function insertFAQTicket(PDO $db, int $faq_id, int $ticket_id){
    $statement = $db->prepare('INSERT INTO FAQTicket (faq_id, ticket_id) VALUES (:faq_id, :ticket_id)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':ticket_id', $ticket_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQQuestion(PDO $db, int $faq_id, int $quest_id){
    $statement = $db->prepare('INSERT INTO FAQQuestion (faq_id, quest_id) VALUES (:faq_id, :quest_id)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':quest_id', $quest_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQAnswer(PDO $db, int $faq_id, int $ans_id){
    $statement = $db->prepare('INSERT INTO FAQAnswer (faq_id, ans_id) VALUES (:faq_id, :ans_id)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':ans_id', $ans_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQComment(PDO $db, int $faq_id, int $comment_id){
    $statement = $db->prepare('INSERT INTO FAQComment (faq_id, comment_id) VALUES (:faq_id, :comment_id)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $statement->execute();
}
?>

<?php function insertFAQTicketHashtag(PDO $db, int $faq_id, string $name){
    $statement = $db->prepare('INSERT INTO FAQTicketHashtag (faq_id, name) VALUES (:faq_id, :name)');
    $statement->bindParam(':faq_id', $faq_id, PDO::PARAM_INT);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->execute();
}
?>

