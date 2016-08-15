<?php

namespace EasyCharts;

class EasyCharts {

	protected $config;

	function __construct( $args = array() ) {
		$this->config = array_merge( array(
			'name'   => 'chart',
			'type'   => 'bar',
		), $args );
	}

	public function draw() {
		$chart_json = json_encode(
			array(
				'type' => $this->config['type'],
				'data' => $this->config,
			)
		);

		?>
		<canvas id="<?php echo $this->config['name']; ?>" width="<?php echo $this->config['width']; ?>" height="<?php echo $this->config['height']; ?>"></canvas>
		<script>
			var ctx = document.getElementById( '<?php echo $this->config['name']; ?>' );
			var myChart = new Chart(ctx, <?php echo $chart_json; ?> );
		</script>
		<?php
	}

}
