<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use SimpleXMLElement;

class WeatherAPIController extends Controller
{
    public function consume()
    {
        $url = 'https://data.bmkg.go.id/DataMKG/MEWS/DigitalForecast/DigitalForecast-Indonesia.xml';

        $client = new Client();
        $response = $client->get($url);

        if ($response->getStatusCode() === 200) {
            $xmlData = $response->getBody()->getContents();
            $xml = new SimpleXMLElement($xmlData);

            // Extract issue details
            $issue = $xml->forecast->issue;
            $timestamp = (string)$issue->timestamp;
            $year = (string)$issue->year;
            $month = (string)$issue->month;
            $day = (string)$issue->day;
            $hour = (string)$issue->hour;
            $minute = (string)$issue->minute;
            $second = (string)$issue->second;

            // Extract area details
            $area = $xml->forecast->area;
            $area_id = (string)$area['id'];
            $description = (string)$area['description'];
            $domain = (string)$area['domain'];

            // Extract weather with datetime
            $weatherData = [];
            foreach ($area->parameter->timerange as $timerange) {
                $datetime = (string)$timerange['datetime'];
                $weather = (string)$timerange->value;
                $weatherData[] = [
                    'datetime' => $datetime,
                    'weather' => $weather,
                ];
            }

            $weatherDescriptions = [
                '0' => 'Cerah / Clear Skies',
                '1' => 'Cerah Berawan / Partly Cloudy',
                '2' => 'Cerah Berawan / Partly Cloudy',
                '3' => 'Berawan / Mostly Cloudy',
                '4' => 'Berawan Tebal / Overcast',
                '5' => 'Udara Kabur / Haze',
                '10' => 'Asap / Smoke',
                '45' => 'Kabut / Fog',
                '60' => 'Hujan Ringan / Light Rain',
                '61' => 'Hujan Sedang / Rain',
                '63' => 'Hujan Lebat / Heavy Rain',
                '80' => 'Hujan Lokal / Isolated Shower',
                '95' => 'Hujan Petir / Severe Thunderstorm',
                '97' => 'Hujan Petir / Severe Thunderstorm',
            ];

            // return response()->json([
            //     'area_id' => $area_id,
            //     'description' => $description,
            //     'domain' => $domain,
            //     'issue_datetime' => "$year-$month-$day $hour:$minute:$second",
            //     'weather_data' => $weatherData,
            // ]);

            return view('weather', [
                'area_id' => $area_id,
                'description' => $description,
                'domain' => $domain,
                'issue_datetime' => "$day-$month-$year $hour:$minute:$second",
                'weather_data' => $weatherData,
                'weatherDescriptions' => $weatherDescriptions,
            ]);
        } else {
            return response('Error: Unable to fetch data from the API', 500);
        }
    }
}
