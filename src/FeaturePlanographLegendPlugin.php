<?php

if (!class_exists(Feature_Planograph_Legend_Plugin::class)) {
    class Feature_Planograph_Legend_Plugin {
        private const PLANOGRAPH_INIT_SCRIPT_NAME = 'feature-planograph-legend/planograph-init';
        private const PLANOGRAPH_INIT_SCRIPT_URL = 'https://planograph.net/js/run.js';

        private const PLANOGRAPH_MAP_BLOCK_TYPE = 'feature-planograph-legend/map';

        public static function plugin_activation(): void {
            self::create_db();
        }

        public static function plugin_deactivation(): void {
            self::delete_db();
        }

        private static function create_db(): void {
        }

        private static function delete_db(): void {
        }

        public static function init(): void {
            self::init_blocks();

            add_action( 'wp_enqueue_scripts', static function () {
                self::try_include_script();
            } );
        }

        private static function init_blocks(): void {
            register_block_type( FEATURE_PLANOGRAPH_LEGEND_ROOT . '/blocks/map/build' );
        }

        private static function try_include_script(): void {
            if ( ! has_block( self::PLANOGRAPH_MAP_BLOCK_TYPE ) ) {
                return;
            }
        
            self::include_planograph_init_script();
        }

        private static function include_planograph_init_script(): void {
            wp_enqueue_script(
                self::PLANOGRAPH_INIT_SCRIPT_NAME,
                self::PLANOGRAPH_INIT_SCRIPT_URL,
                false,
                true
            );
        }
    }
}