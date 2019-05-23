<?php declare(strict_types=1);

namespace INOWAS\SensorData;

use OpenMetricsPhp\Exposition\Text\Collections\CounterCollection;
use OpenMetricsPhp\Exposition\Text\Collections\GaugeCollection;
use OpenMetricsPhp\Exposition\Text\HttpResponse;
use OpenMetricsPhp\Exposition\Text\Metrics\Counter;
use OpenMetricsPhp\Exposition\Text\Metrics\Gauge;
use OpenMetricsPhp\Exposition\Text\Types\Label;
use OpenMetricsPhp\Exposition\Text\Types\MetricName;
use Throwable;
use function random_int;

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

try
{
	$gauges = GaugeCollection::fromGauges(
		MetricName::fromString( 'sensor_data' ),
		Gauge::fromValue( (float)random_int( 3090, 3110 ) )->withLabels(
			Label::fromNameAndValue( 'name', 'Location 1' ),
			Label::fromNameAndValue( 'type', 'head' )
		),
		Gauge::fromValue( (float)random_int( 1350, 1400 ) )->withLabels(
			Label::fromNameAndValue( 'name', 'Location 2' ),
			Label::fromNameAndValue( 'type', 'pressure' )
		)
	)->withHelp( 'The measured values by the sensors' );

	HttpResponse::fromMetricCollections( $gauges )
	            ->withHeader( 'Content-Type', 'text/plain; charset=utf-8' )
	            ->respond();
}
catch ( Throwable $e )
{
	echo "W000psie!\n{$e->getMessage()}\n{$e->getTraceAsString()}";
}
