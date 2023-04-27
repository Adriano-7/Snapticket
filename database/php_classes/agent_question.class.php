<?php
declare(strict_types=1);
require_once 'agent.class.php';
require_once 'question.class.php';
class AgentQuestion{
    public ?Agent $agent;
    public ?Question $question;

    public function __construct($agent, $question){
        $this->agent = $agent;
        $this->question = $question;
    }
}
?>