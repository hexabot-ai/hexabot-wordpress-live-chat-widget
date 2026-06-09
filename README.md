# Hexabot WordPress Chat Widget Plugin

[Hexabot](https://hexabot.ai/) v3 is a self-hostable AI automation platform for building conversational workflows that talk, act, and remember. It helps teams automate support, operations, and customer-facing processes across web chat and other channels. For more details, see the [official Hexabot repository](https://github.com/hexabot-ai/hexabot).

The Hexabot Live Chat Widget is a React-based component that connects websites to a Hexabot API and web source. The **Hexabot Chat Widget** WordPress plugin bundles that widget so you can add Hexabot-powered conversational workflows to a WordPress site without editing theme files.

## Features

- Bundled `@hexabot-ai/widget` 3.2.2 JavaScript and CSS assets
- WordPress admin settings for API URL and v3 Source Ref
- Optional Workflow ID routing
- Optional primary color, language, and max upload size customization
- WebSocket or polling transport mode
- Automatic rendering on all public WordPress pages after required settings are configured

Configure the website source, allowed domains, greeting, title, avatar, menu, allowed upload MIME types, and interaction toggles in Hexabot Admin under **Integrations/Channels** or `/settings/sources`. Configure the WordPress embed connection from **Settings > Hexabot Chat Widget**.

## Requirements

- WordPress 5.6 or higher
- PHP 7.4 or higher
- A running Hexabot v3 API
- A Hexabot web Source Ref

## Installation

1. Clone or download this plugin.
2. Upload the `hexabot` directory to `/wp-content/plugins/`.
3. Activate **Hexabot Chat Widget** from the WordPress admin Plugins screen.
4. In Hexabot Admin, go to **Integrations/Channels** or `/settings/sources` and create or select an enabled source for this WordPress website.
5. In that Hexabot source, set the channel to `web`, configure allowed domains and source settings, then copy the Source Ref.
6. In WordPress, go to **Settings > Hexabot Chat Widget** and configure:
   - **API URL**: The public URL of your Hexabot API.
   - **Source Ref**: The web source reference from Hexabot. The widget sends it as `sourceId`.
   - **Workflow ID**: Optional override when this site should start a specific workflow instead of the source default.
   - **Primary Color**: Optional 6-digit hex color override. Leave empty to use the source/theme settings from Hexabot.
   - **Transport**: `WebSocket` by default, or `Polling` if your hosting/proxy blocks WebSocket upgrades.
   - **Language**: Optional widget language code such as `en` or `fr`.
   - **Max Upload Size**: Optional client-side upload limit in bytes. Enforce the same limit on the Hexabot API.
7. Save changes.

The widget renders only when both API URL and Source Ref are configured.

## Usage

After configuration, the plugin adds the Hexabot widget to the WordPress footer and initializes it with:

- `channel: "web"`
- the configured Source Ref as `sourceId`
- optional `workflowId`
- optional `primaryColor`
- selected `transport`
- optional `language`
- optional `maxUploadSize`

Hexabot v3 uses source-based website integration. The old v2 channel and credential settings are no longer used.

## Settings

Hexabot-side settings live in **Hexabot Admin > Integrations/Channels** or `/settings/sources`. Configure the web source there before filling in the WordPress plugin form. This is where allowed domains, default workflow, greeting message, window title, avatar, persistent menu, file/location/emoji toggles, allowed upload MIME types, thread inactivity, and other source behavior belong.

WordPress-side settings live in **WordPress Admin > Settings > Hexabot Chat Widget**. This page connects WordPress to the Hexabot source and sets widget client overrides:

- **API URL**: Public URL of your Hexabot API. Include `/api` if your deployment exposes the API under that path, for example `https://yourdomain.com/api`.
- **Source Ref**: Reference of the enabled Hexabot web source created for this WordPress site. The widget passes this value as `sourceId`.
- **Workflow ID**: Optional override. Leave empty to use the source default workflow.
- **Primary Color**: Optional color override. Leave empty to use the Hexabot source/theme settings.
- **Transport**: Use `WebSocket` unless your hosting or proxy requires `Polling`.
- **Language**: Optional widget language code. Leave empty to use the widget default.
- **Max Upload Size**: Optional client-side upload limit in bytes. This is not a web source setting, so enforce the same value in the Hexabot API upload configuration.

## Contributing

We welcome contributions from the community. Report bugs, suggest features, or submit pull requests through the plugin repository.

Join us on [Discord](https://discord.gg/rNb9t2MFkG).

## Resources

- Plugin repository: https://github.com/hexabot-ai/hexabot-wordpress-live-chat-widget
- Hexabot repository: https://github.com/hexabot-ai/hexabot
- Website: https://hexabot.ai
- Documentation: https://docs.hexabot.ai
- Widget integration guide: https://docs.hexabot.ai/faq/how-can-i-add-the-chat-widget-to-my-website

## Changelog

### 3.2.2

- Updated bundled widget assets to `@hexabot-ai/widget` 3.2.2.
- Migrated settings from v2 token/channel configuration to v3 Source Ref integration.
- Added optional Workflow ID, primary color, transport, language, and max upload size settings.
- Updated docs and links for Hexabot v3.

## License

This plugin is licensed under the GNU Affero General Public License v3.0 (AGPLv3).
