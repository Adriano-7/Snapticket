<?php
declare(strict_types=1);
class MemberFilters{
    public string $search;
    public string $department;
    public string $role;

    public string $orderName;
    public string $orderUsername;
    public string $orderRole;
    public string $orderDepartment;

    public function __construct(string $search="", string $department = "", string $role = "", string $orderName = "", string $orderUsername = "", string $orderRole = "", string $orderDepartment = "")
    {
        $this->search = $search;
        $this->department = $department;
        $this->role = $role;
        $this->orderName = $orderName;
        $this->orderUsername = $orderUsername;
        $this->orderRole = $orderRole;
        $this->orderDepartment = $orderDepartment;
    }
}

?>
