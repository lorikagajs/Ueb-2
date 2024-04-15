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
$tickets[] = new Tickets("Action Movie Premiere", "2024-01-15", "Pejë", "Movie");
$tickets[] = new Tickets("Pop Music Festival", "2024-02-20", "Prishtinë", "Concert");
$tickets[] = new Tickets("Sightseeing Tour", "2024-03-05", "Gjakovë", "Travel");
$tickets[] = new Tickets("Comedy Show", "2024-04-10", "Prizren", "Concert");
$tickets[] = new Tickets("Beach Vacation", "2024-05-15", "Mitrovicë", "Travel");
$tickets[] = new Tickets("Classic Movie Night", "2024-06-20", "Ferizaj", "Movie");
$tickets[] = new Tickets("Electronic Music Party", "2024-07-25", "Pejë", "Concert");
$tickets[] = new Tickets("Hiking Trip", "2024-08-30", "Prishtinë", "Travel");
$tickets[] = new Tickets("Drama Play", "2024-09-05", "Gjakovë", "Concert");
$tickets[] = new Tickets("Historical Tour", "2024-10-10", "Prizren", "Travel");
$tickets[] = new Tickets("Documentary Screening", "2024-11-15", "Mitrovicë", "Movie");
$tickets[] = new Tickets("Food Festival", "2024-12-20", "Ferizaj", "Concert");
$tickets[] = new Tickets("Science Fiction Movie Night", "2025-01-25", "Pejë", "Movie");
$tickets[] = new Tickets("Classical Music Concert", "2025-02-10", "Prishtinë", "Concert");
$tickets[] = new Tickets("Road Trip", "2025-03-15", "Gjakovë", "Travel");
$tickets[] = new Tickets("Art Exhibition", "2025-04-20", "Prizren", "Concert");
$tickets[] = new Tickets("Camping Adventure", "2025-05-25", "Mitrovicë", "Travel");
$tickets[] = new Tickets("Horror Movie Marathon", "2025-06-10", "Ferizaj", "Movie");
$tickets[] = new Tickets("Reggae Night", "2025-07-15", "Pejë", "Concert");
$tickets[] = new Tickets("Wine Tasting Tour", "2025-08-20", "Prishtinë", "Travel");
$tickets[] = new Tickets("Fashion Show", "2025-09-25", "Gjakovë", "Concert");
$tickets[] = new Tickets("Zoo Visit", "2025-10-30", "Prizren", "Travel");
$tickets[] = new Tickets("Indie Movie Screening", "2025-11-05", "Mitrovicë", "Movie");
$tickets[] = new Tickets("Pop-Up Restaurant", "2025-12-10", "Ferizaj", "Concert");

$organizedTickets = array();
foreach ($tickets as $ticket) {
    $type = $ticket->getType();
    $organizedTickets[$type][] = array(
        "title" => $ticket->getTitle(),
        "date" => $ticket->getDate(),
        "location" => $ticket->getLocation(),
        "type" => $type
    );
}

echo "<pre>";
print_r($organizedTickets);
echo "</pre>";
?>