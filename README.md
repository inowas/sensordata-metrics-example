# INOWAS Sensor Data Example

A VERY simple PHP setup to generate example business metrics

## Installation

Assuming you have installed `composer` run
```
$ composer install
``` 
to install the relevant packages.

## Test

Run the php-server locally to test it:
```
php -S 0.0.0.0:8080 -t ./public
```

Open the metrics script:
```
http://localhost:8080/metrics.php
```

You will see something like this:
```
# TYPE sensor_data gauge
# HELP sensor_data The measured values by the sensors
sensor_data{name="Location 1", type="head"} 3103.000000
sensor_data{name="Location 2", type="pressure"} 1378.000000
```
