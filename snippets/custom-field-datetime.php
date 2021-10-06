<?php

class CustomFieldDateTimeMapper {

	/**
	 * @var string
	 */
	private $meta_key;

	public function __construct( $meta_key ) {
		$this->meta_key = $meta_key;
	}

	public function register() {
		add_filter( 'acp/editing/view_settings', [ $this, 'alterEditSettings' ], 10, 2 );
		add_filter( 'acp/custom_field/stored_date_format', [ $this, 'setStorageDateFormat' ], 10, 2 );
	}

	public function setStorageDateFormat( $date_format, $column ) {
		if ( $this->isColumnMatch( $column ) ) {
			return 'Y-m-d H:i:s';
		}

		return $date_format;
	}

	public function alterEditSettings( $data, $column ) {
		if ( $this->isColumnMatch( $column ) ) {
			$data['type'] = 'date_time';
		}

		return $data;
	}

	private function isColumnMatch( AC\Column $column ): bool {
		return $column instanceof ACP\Column\CustomField && $this->meta_key === $column->get_meta_key() && 'date' === $column->get_field_type();
	}

}

// Register all hooks for specific meta key that uses datetime format
( new CustomFieldDateTimeMapper( 'my_datetime_date' ) )->register();