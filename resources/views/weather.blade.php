<!DOCTYPE html>
<html>
<head>
    <title>Weather Forecast</title>
</head>
<body>
    <h1>Weather Forecast for {{ $description }}, {{ $domain }}</h1>
    <p>Area ID: {{ $area_id }}</p>
    <p>Issue Datetime: {{ $issue_datetime }}</p>
    <table>
        <thead>
            <tr>
                <th>Datetime</th>
                <th>Weather Code</th>
                <th>Weather Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weather_data as $data)
                <tr>
                    <td>{{ $data['datetime'] }}</td>
                    <td>{{ $data['weather'] }}</td>
                    <td>
                        @if (isset($weatherDescriptions[$data['weather']]))
                            {{ $weatherDescriptions[$data['weather']] }}
                        @else
                            Unknown
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
