<?php

class Tickets
{

    private $title;
    private $date;
    private $location;
    private $type;

    public function __construct($title, $date, $location, $type)
    {
        $this->title = $title;
        $this->date = $date;
        $this->location = $location;
        $this->type = $type;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function getType()
    {
        return $this->type;
    }
}

$tickets = array();
$tickets[] = new Tickets("Avengers: Endgame", "2024-04-10", "prishtine", "Movie");
$tickets[] = new Tickets("Ed Sheeran Concert", "2024-04-15", "prishtine", "Concert");
$tickets[] = new Tickets("Hawaiian Vacation", "2024-05-01", "Maui, Hawaii", "Travel");
$tickets[] = new Tickets("Star Wars Marathon", "2024-05-05", "Cinema B", "Movie");
$tickets[] = new Tickets("John Mayer Concert", "2024-05-10", "Outdoor Amphitheater", "Concert");
$tickets[] = new Tickets("European Adventure", "2024-05-20", "Multiple Cities in Europe", "Travel");
