<?php 
declare(strict_types=1);

class TicketFilters{
    public string $search;
    public string $department;
    public string $status;
    public string $priority;
    public string $assignee;
    public string $hashtag;

    public string $orderId;
    public string $orderAssignee;
    public string $orderDescription;

    public function __construct(string $search="", string $department = "", string $status = "", string $priority = "", string $assignee = "", string $hashtag = "", string $orderId = "", string $orderAssignee = "", string $orderDescription = ""){
        $this->search = $search;
        $this->department = $department;
        $this->status = $status;
        $this->priority = $priority;
        $this->assignee = $assignee;
        $this->hashtag = $hashtag;
        $this->orderId = $orderId;
        $this->orderAssignee = $orderAssignee;
        $this->orderDescription = $orderDescription;
    }
    
}
?>