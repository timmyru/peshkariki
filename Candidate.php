<?php

require_once 'CandidateAbstract.php';
require_once 'Toolkit.php';
require_once 'db/Db.php';

class Candidate extends CandidateAbstract
{
    /**
     * sends info about user and closest point in json format
     */
    public function run()
    {
        $info = $this->calculateDistance(Toolkit::getCoords($_GET['address']));
        $info['name'] = $_GET['name'];
        $info['phone'] = Toolkit::getFormattedPhone($_GET['phone']);
        echo json_encode($info);
    }

    /**
     * @param $coordsCandidate
     * @return array
     */
    protected function calculateDistance($coordsCandidate)
    {
        $pointsCoordinates = (new Db())
            ->query('SELECT name, latitude, longitude, image FROM point')
            ->fetchAll();
        $coordsCandidate['lat'] *= M_PI / 180;
        $coordsCandidate['lng'] *= M_PI / 180;

        //радиус Земли в км
        $radius = 6372.797;

        $info = [
            'distance' => 0,
            'pointName' => 'Ничего не найдено',
            'image' => 'default.jpg'
        ];
        foreach ($pointsCoordinates as $point) {
            $point['latitude'] *= M_PI / 180;
            $point['longitude'] *= M_PI / 180;
            $diffLat = $point['latitude'] - $coordsCandidate['lat'];
            $diffLng = $point['longitude'] - $coordsCandidate['lng'];
            $countDistance = sin($diffLat / 2) * sin($diffLat / 2) + cos($point['latitude']) * cos($coordsCandidate['lat']) * sin($diffLng / 2) * sin($diffLng / 2);
            $currentDistance = 2 * $radius * atan2(sqrt($countDistance), sqrt(1 - $countDistance));

            if ($currentDistance < $info['distance'] || $info['distance'] === 0) {
                $info['pointName'] = $point['name'];
                $info['image'] = $point['image'];
                $info['distance'] = number_format($currentDistance, 1);
            }
        }

        return $info;
    }
}