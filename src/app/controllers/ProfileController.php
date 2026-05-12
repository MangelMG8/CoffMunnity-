<?php
require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller
{

    public function showProfile()
    {
        $this->requireAuth();


        $userId = $_SESSION['user_id'];
        $userRole = $_SESSION['role'];

        $canEdit = true;

        require_once __DIR__ . '/../views/profile/view_profile.php';
    }
}
