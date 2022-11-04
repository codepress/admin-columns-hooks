<?php

class CustomFieldTimestampMapper {

	/**
	 * @var string
	 */
	private $meta_key;

	public function __construct( $meta_key ) {
		$this->meta_key = $meta_key;
	}

	public function register() {
		add_filter( 'acp/editing/view', [ $this, 'alterEditSettings' ], 10, 2 );
		add_filter( 'acp/editing/save_value', [ $this, 'alterSaveValue' ], 10, 2 );
		add_filter( 'acp/sorting/custom_field/date_type', [ $this, 'changeSortingDateType' ], 10, 2 );
		add_filter( 'acp/custom_field/stored_date_format', [ $this, 'changeStoredDateFormat' ], 10, 2 );
	}

	public function alterEditSettings( ACP\Editing\View $view, $column ) {
		if ( $this->isColumnMatch( $column ) ) {
			return new ACP\Editing\View\DateTime();
		}

		return $view;
	}

	public function alterSaveValue( $value, AC\Column $column ) {
		if ( $value && $this->isColumnMatch( $column ) ) {
			$value = strtotime( $value );
		}

		return $value;
	}

	public function changeSortingDateType( $date_type, AC\Column\CustomField $column ) {
		if ( $this->isColumnMatch( $column ) ) {
			$date_type = 'numeric';
		}

		return $date_type;
	}

	public function changeStoredDateFormat( $date_format, AC\Column\CustomField $column ) {
		if ( $this->isColumnMatch( $column ) ) {
			$date_format = 'U';
		}

		return $date_format;
	}

	private function isColumnMatch( AC\Column $column ): bool {
		return $column instanceof ACP\Column\CustomField && $this->meta_key === $column->get_meta_key() && 'date' === $column->get_field_type();
	}

}

// Register all hooks for a specific meta_key
( new CustomFieldTimestampMapper( 'my_timestamp_date' ) )->register();