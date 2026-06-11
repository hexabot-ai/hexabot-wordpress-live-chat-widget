<?php
/*
Plugin Name: Hexabot Chat Widget
Description: Embed Hexabot chat widget into WordPress.
Version: 3.2.3
Author: Hexastack
License: AGPLv3
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define plugin version for cache busting
define( 'HEXABOT_CHAT_WIDGET_VERSION', '3.2.3' );

function hexabot_chat_widget_sanitize_color( $value ) {
    $value = sanitize_text_field( $value );

    if ( '' === $value ) {
        return '';
    }

    return preg_match( '/^#[0-9a-fA-F]{6}$/', $value ) ? $value : '';
}

function hexabot_chat_widget_sanitize_transport( $value ) {
    $value = sanitize_text_field( $value );

    return in_array( $value, array( 'ws', 'polling' ), true ) ? $value : 'ws';
}

function hexabot_chat_widget_sanitize_positive_integer( $value ) {
    if ( '' === trim( (string) $value ) ) {
        return '';
    }

    $value = absint( $value );

    return $value > 0 ? $value : '';
}

// Register settings for the plugin
function hexabot_chat_widget_register_settings() {
    add_option( 'hexabot_api_url', '' );
    add_option( 'hexabot_source_id', '' );
    add_option( 'hexabot_workflow_id', '' );
    add_option( 'hexabot_primary_color', '' );
    add_option( 'hexabot_transport', 'ws' );
    add_option( 'hexabot_language', '' );
    add_option( 'hexabot_max_upload_size', '' );

    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_api_url',
        array(
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_source_id',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_workflow_id',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_primary_color',
        array(
            'sanitize_callback' => 'hexabot_chat_widget_sanitize_color',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_transport',
        array(
            'sanitize_callback' => 'hexabot_chat_widget_sanitize_transport',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_language',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    register_setting(
        'hexabot_chat_widget_options_group',
        'hexabot_max_upload_size',
        array(
            'sanitize_callback' => 'hexabot_chat_widget_sanitize_positive_integer',
        )
    );
}
add_action( 'admin_init', 'hexabot_chat_widget_register_settings' );

// Add settings page to the admin menu
function hexabot_chat_widget_register_options_page() {
    add_options_page( 'Hexabot Chat Widget Settings', 'Hexabot Chat Widget', 'manage_options', 'hexabot_chat_widget', 'hexabot_chat_widget_options_page' );
}
add_action( 'admin_menu', 'hexabot_chat_widget_register_options_page' );

// Render the settings page
function hexabot_chat_widget_options_page() {
    ?>
    <div class="wrap">
        <h1>Hexabot Chat Widget Settings</h1>
        <p>
            Configure the website source and widget behavior in Hexabot Admin under <strong>Integrations/Channels</strong>
            or <code>/settings/sources</code>.
            Use this WordPress page to connect your site to that Hexabot source and set widget client overrides.
        </p>
        <form method="post" action="options.php">
            <?php settings_fields( 'hexabot_chat_widget_options_group' ); ?>
            <table class="form-table" role="presentation">
                <tr>
                    <th scope="row"><label for="hexabot_api_url">API URL</label></th>
                    <td>
                        <input class="regular-text" type="url" id="hexabot_api_url" name="hexabot_api_url" value="<?php echo esc_attr( get_option( 'hexabot_api_url' ) ); ?>" placeholder="https://api.yourdomain.com/api" />
                        <p class="description">The public URL of your Hexabot API. Include the API path if your deployment exposes it under one, for example https://yourdomain.com/api.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_source_id">Source Ref</label></th>
                    <td>
                        <input class="regular-text" type="text" id="hexabot_source_id" name="hexabot_source_id" value="<?php echo esc_attr( get_option( 'hexabot_source_id' ) ); ?>" />
                        <p class="description">Create or select an enabled web source in Hexabot Admin under Integrations/Channels or /settings/sources, configure its allowed domains and source settings, then paste its Source Ref here. The widget passes this value as sourceId.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_workflow_id">Workflow ID</label></th>
                    <td>
                        <input class="regular-text" type="text" id="hexabot_workflow_id" name="hexabot_workflow_id" value="<?php echo esc_attr( get_option( 'hexabot_workflow_id' ) ); ?>" />
                        <p class="description">Optional. Leave empty to use the source default workflow; set only when this WordPress site should override it.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_primary_color">Primary Color</label></th>
                    <td>
                        <input type="text" id="hexabot_primary_color" name="hexabot_primary_color" value="<?php echo esc_attr( get_option( 'hexabot_primary_color' ) ); ?>" placeholder="#0074d9" pattern="^#[0-9a-fA-F]{6}$" />
                        <p class="description">Optional. Use a 6-digit hex color such as #1ba089, or leave empty to use the source/theme settings from Hexabot.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_transport">Transport</label></th>
                    <td>
                        <select id="hexabot_transport" name="hexabot_transport">
                            <?php $transport = get_option( 'hexabot_transport', 'ws' ); ?>
                            <option value="ws" <?php selected( $transport, 'ws' ); ?>>WebSocket</option>
                            <option value="polling" <?php selected( $transport, 'polling' ); ?>>Polling</option>
                        </select>
                        <p class="description">Use WebSocket by default. Select polling only if your hosting or proxy blocks WebSocket upgrades.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_language">Language</label></th>
                    <td>
                        <input class="regular-text" type="text" id="hexabot_language" name="hexabot_language" value="<?php echo esc_attr( get_option( 'hexabot_language' ) ); ?>" placeholder="en" />
                        <p class="description">Optional widget language code, for example en or fr. Leave empty to use the widget default.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="hexabot_max_upload_size">Max Upload Size</label></th>
                    <td>
                        <input class="regular-text" type="number" min="1" step="1" id="hexabot_max_upload_size" name="hexabot_max_upload_size" value="<?php echo esc_attr( get_option( 'hexabot_max_upload_size' ) ); ?>" placeholder="10485760" />
                        <p class="description">Optional client-side upload limit in bytes. Hexabot docs keep this outside the web source settings; enforce the same limit in your Hexabot API upload configuration.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Function to embed the chat widget container and scripts in the footer
function hexabot_chat_widget_embed() {
    $api_url   = trim( get_option( 'hexabot_api_url', '' ) );
    $source_id = trim( get_option( 'hexabot_source_id', '' ) );

    if ( '' === $api_url || '' === $source_id ) {
        return;
    }

    $workflow_id     = sanitize_text_field( trim( get_option( 'hexabot_workflow_id', '' ) ) );
    $primary_color   = hexabot_chat_widget_sanitize_color( trim( get_option( 'hexabot_primary_color', '' ) ) );
    $transport       = hexabot_chat_widget_sanitize_transport( get_option( 'hexabot_transport', 'ws' ) );
    $language        = sanitize_text_field( trim( get_option( 'hexabot_language', '' ) ) );
    $max_upload_size = hexabot_chat_widget_sanitize_positive_integer( get_option( 'hexabot_max_upload_size', '' ) );

    $widget_config = array(
        'apiUrl'    => esc_url_raw( $api_url ),
        'channel'   => 'web',
        'sourceId'  => sanitize_text_field( $source_id ),
        'transport' => $transport,
    );

    if ( '' !== $workflow_id ) {
        $widget_config['workflowId'] = $workflow_id;
    }

    if ( '' !== $primary_color ) {
        $widget_config['primaryColor'] = $primary_color;
    }

    if ( '' !== $language ) {
        $widget_config['language'] = $language;
    }

    if ( '' !== $max_upload_size ) {
        $widget_config['maxUploadSize'] = $max_upload_size;
    }

    // Output the chat widget div
    echo '<div id="hb-chat-widget"></div>';

    // Enqueue React and React DOM in compatibility mode (they are loaded as window.React and window.ReactDOM)
    wp_enqueue_script( 'react' );
    wp_enqueue_script( 'react-dom' );

    // Enqueue Hexabot widget
    wp_enqueue_script( 'hexabot-widget', plugin_dir_url( __FILE__ ) . 'assets/hexabot-widget.umd.js', array( 'react', 'react-dom' ), HEXABOT_CHAT_WIDGET_VERSION, true );

    $style_url = plugin_dir_url( __FILE__ ) . 'assets/hexabot-widget.css';
    $config    = wp_json_encode( $widget_config );

    // Add inline script to initialize the widget after the div
    wp_add_inline_script(
        'hexabot-widget',
        "
        (function() {
            var widgetRoot = document.getElementById('hb-chat-widget');

            if (!widgetRoot || !window.React || !window.ReactDOM || !window.HexabotWidget) {
                return;
            }

            var createElement = function(tag, props) {
                return Object.assign(document.createElement(tag), props || {});
            };
            var shadowContainer = createElement('div');

            widgetRoot
                .attachShadow({ mode: 'open' })
                .append(
                    shadowContainer,
                    createElement('link', {
                        rel: 'stylesheet',
                        href: '" . esc_url( $style_url ) . "'
                    })
                );

            ReactDOM.render(
                React.createElement(HexabotWidget, " . $config . '),
                shadowContainer
            );
        })();
    '
    );
}

// Hook the function to embed the widget container and enqueue scripts to wp_footer
add_action( 'wp_footer', 'hexabot_chat_widget_embed' );
