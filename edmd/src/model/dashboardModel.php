<?php
class dashboardModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function totalUsers() {
        $query = Query::TOTAL_USERS_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
