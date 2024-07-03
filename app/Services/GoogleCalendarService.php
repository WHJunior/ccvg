<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;

class GoogleCalendarService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $credentialsPath = env('GOOGLE_CALENDAR_CREDENTIALS_PATH');

        $this->client = new Google_Client();
        $this->client->setAuthConfig($credentialsPath);
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->service = new Google_Service_Calendar($this->client);
    }

    public function createEvent($eventData)
    {
        $event = new Google_Service_Calendar_Event($eventData);
        $calendarId = 'primary';
        $event = $this->service->events->insert($calendarId, $event);
        return $event->htmlLink;
    }

}