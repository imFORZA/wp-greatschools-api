<?php
/**
 * WP GreatSchools API
 *
 * @package WP-GreatSchools-API
 */
/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! class_exists( 'GreatSchoolsAPI' ) ) {
	/**
	 * GreatSchools API Class.
	 */
	class GreatSchoolsAPI {
		/**
		 * API Key.
		 *
		 * @var string
		 */
		static private $api_key;

		/**
		 * Output Type.
		 *
		 * @var string
		 */
		static private $output;

		/**
		 * BaseAPI Endpoint
		 *
		 * @var string
		 * @access public
		 */
		public $base_uri = 'http://api.greatschools.org/schools/';

		/**
		 * __construct function.
		 *
		 * @access public
		 * @param mixed $api_key API Key
		 * @param string $output (default: 'json') Output.
		 * @return void
		 */
		public function __construct( $api_key, $output = 'json' ) {
			static::$api_key = $api_key;
			static::$output = $output;
		}

		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$response = wp_remote_get( $request );

			$code = wp_remote_retrieve_response_code( $response );

			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'text-domain' ), $code ) );
			}

			$body = wp_remote_retrieve_body( $response );

			return $body;
		}
		/**
		 * get_schools function.
		 *
		 * @access public
		 * @param mixed $state State.
		 * @param mixed $city City.
		 * @return void
		 */
		public function get_schools( $state, $city ) {

			$request = $this->base_uri . $state . '/' . $city . '?key=' . static::$api_key;

			return $this->fetch( $request );
		}

		/**
		 * get_nearby_schools function.
		 *
		 * @access public
		 * @param mixed $state
		 * @param mixed $zip
		 * @param mixed $city
		 * @param mixed $address
		 * @param mixed $latitude
		 * @param mixed $longitude
		 * @param mixed $school_type
		 * @param mixed $level_code
		 * @param mixed $radius
		 * @param mixed $limit
		 * @return void
		 */
		public function get_nearby_schools( $state, $zip, $city, $address, $latitude, $longitude, $school_type, $level_code, $radius, $limit ) {
		}
		public function get_school( $state, $school_id ) {
		}
		public function search_for_schools( $state, $query_string ) {
		}
		public function get_school_reviews( $state, $city, $school_id ) {
		}
		public function get_review_topics() {
		}
		public function get_school_test_scores( $state, $school_id ) {
		}
		public function get_school_census_data( $state, $school_id ) {
		}
		public function get_city_schools( $state, $city ) {
		}
		public function get_nearby_cities( $state, $city ) {
		}
		public function get_districts( $state, $city ) {
		}
	}
}
