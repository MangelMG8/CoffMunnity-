<?php
require_once __DIR__ . '/Controller.php';

class IndexController extends Controller {
    public function showIndex() {
        $this->requireAuth();
        
        require_once __DIR__ . '/../views/index/view_index.php';
    }
}