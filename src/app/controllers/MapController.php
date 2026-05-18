<?php
require_once __DIR__ . '/Controller.php';

class MapController extends Controller {
    public function showMap() {
        $this->requireAuth();
        
        require_once __DIR__ . '/../views/map/view_map.php';
    }
}

?>