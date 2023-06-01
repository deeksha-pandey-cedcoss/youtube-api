<?php

use Phalcon\Mvc\Controller;

// defalut controller view
class IndexController extends Controller
{
    public function indexAction()
    {
        //    default action

    }
    public function searchAction()
    {

        $search = $_POST['search'];
        $ch = curl_init();

        $token = "ya29.a0AWY7CklNIRNvavDNoCyTLNIeOD-UCUba96gwBEpZYIzpmRTFvnAJSqqvJ-5_V4pxUhc3QseJ_AXdre3LMH_lV-NXej2g5HMGbmBd9NE2YSCUcZlsE7-0y7UrelAyGgkmKofa28AOEdjnrzz2PmKZkWcLK5E7aCgYKAWUSARESFQG1tDrp58eVZQSeL4vrpYAl_bdkJQ0163";

        $url = "https://www.googleapis.com/youtube/v3/search?q=$search";

        $header = [
            'Authorization: Bearer ' . $token
        ];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch), true);
        $this->view->data = $result;
    }
}
