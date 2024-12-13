<?php
class dashboardController {

    public function getTotalUsers() {
        $db = new Database();
        $con = $db->initDatabase();
        $model = new dashboardModel($con);

        return $model->totalUsers();
    }
}
