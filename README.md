# Hexabot Chat Widget for WordPress

Embed the Hexabot v3 Chat Widget on a WordPress website without editing theme files.

[Hexabot](https://hexabot.ai) v3 is a self-hosted, fair-core AI automation platform for building conversational workflows that can answer questions, collect information, trigger actions, and guide users through customer-facing or internal processes. Teams use Hexabot for customer support, lead capture, onboarding, booking flows, customer engagement, and AI-powered workflow automation.

The **Hexabot Chat Widget** WordPress plugin connects your WordPress site to a Hexabot v3 **Web Source** using two values from your Hexabot instance:

- **API URL**: the public URL of your Hexabot API.
- **Source Ref**: the reference of the Web Source created for this website.

Once configured, the plugin loads the bundled `@hexabot-ai/widget` assets, renders the widget on public WordPress pages, and initializes it with the selected Web Source.

## Features

- Adds the Hexabot Chat Widget to WordPress with no theme-file editing.
- Connects WordPress to Hexabot v3 using API URL and Source Ref.
- Supports customer support, lead capture, onboarding, booking, customer engagement, and AI workflow automation use cases.
- Lets site admins set optional Workflow ID, language, primary color, transport mode, and max upload size.
- Uses bundled local JavaScript and CSS assets for WordPress plugin compatibility.
- Works with self-hosted Hexabot v3 deployments.

## Requirements

- WordPress 5.6 or higher
- PHP 7.4 or higher
- A running Hexabot v3 instance
- A Hexabot v3 Web Source for the WordPress website

## 5-Minute Setup

1. Install and activate the plugin in WordPress.
2. In Hexabot Admin, create or select a **Web Source** for this WordPress site.
3. Add the WordPress domain to the Web Source allowed domains.
4. Copy the Web Source **Source Ref**.
5. In WordPress, open **Settings > Hexabot Chat Widget**.
6. Paste the Hexabot **API URL** and **Source Ref**.
7. Save changes and open the public site to test the widget.

The widget renders only when both API URL and Source Ref are configured.

## Installation

1. Clone or download this repository.
2. Upload the `hexabot` directory to `/wp-content/plugins/`.
3. Activate **Hexabot Chat Widget** from **Plugins** in WordPress Admin.
4. Complete the setup from **Settings > Hexabot Chat Widget**.

You can also install the published plugin from the [WordPress plugin directory](https://fr.wordpress.org/plugins/hexabot-chat-widget/).

## Configuration

Hexabot-side behavior is configured in the Web Source. Use Hexabot Admin to set allowed domains, default workflow, greeting, widget title, avatar, persistent menu, upload permissions, interaction toggles, and other source behavior.

WordPress-side settings live in **WordPress Admin > Settings > Hexabot Chat Widget**:

- **API URL**: Public URL of your Hexabot API. Include `/api` if your deployment exposes the API under that path, for example `https://example.com/api`.
- **Source Ref**: Reference of the enabled Hexabot v3 Web Source for this WordPress website. The plugin passes this value to the widget as `sourceId`.
- **Workflow ID**: Optional workflow override. Leave empty to use the Web Source default workflow.
- **Language**: Optional widget language code such as `en` or `fr`. Leave empty to use the widget default.
- **Primary Color**: Optional 6-digit hex color such as `#1ba089`. Leave empty to use the Web Source or theme settings from Hexabot.
- **Transport Mode**: Use **WebSocket** by default. Select **Polling** if your host, CDN, firewall, or reverse proxy blocks WebSocket upgrades.
- **Max Upload Size**: Optional client-side upload limit in bytes, for example `10485760` for 10 MB. Enforce the same limit in your Hexabot API upload configuration.

## How It Works

The plugin hooks into the WordPress footer, creates the `#hb-chat-widget` container, loads React, React DOM, and the bundled Hexabot widget assets, then renders the widget inside a shadow root. The runtime configuration is built from the WordPress settings page and includes the API URL, Source Ref, selected transport mode, and any optional overrides.

Hexabot v3 website integration is source-based. WordPress users should configure a Web Source and paste its Source Ref; legacy v2 connection settings are not used.

## When Should I Use This Plugin?

Use this plugin when the website is powered by WordPress and you want WordPress admins to manage the Hexabot Chat Widget from the dashboard.

Use the generic Hexabot Chat Widget documentation instead when you are embedding the widget in a custom website, SaaS app, landing page, documentation website, or web application where you control the frontend code directly.

## Troubleshooting

**Widget not showing**

Confirm that both API URL and Source Ref are saved, the plugin is active, the theme calls `wp_footer()`, and page cache has been cleared.

**Invalid Source Ref**

Copy the Source Ref from an enabled Hexabot v3 Web Source. Do not use an old credential, token, display name, or workflow ID in this field.

**Domain not allowed**

Add the exact WordPress domain to the Web Source allowed domains in Hexabot Admin. Check both `http`/`https` and `www`/non-`www` variants if your site redirects.

**WebSocket blocked**

Switch **Transport Mode** to **Polling** in WordPress, or update your hosting, CDN, firewall, or reverse proxy to allow WebSocket upgrades to the Hexabot API.

**Uploads not working**

Enable uploads and allowed MIME types in the Web Source, then verify the WordPress max upload setting, the plugin max upload size, and the Hexabot API upload limits.

**Wrong API URL**

Use the public Hexabot API URL reachable from the visitor browser. Include `/api` when your deployment requires it.

**Cache or minification issues in WordPress**

Clear page cache, CDN cache, and optimization plugin cache. If a minifier changes plugin scripts, exclude the Hexabot widget JavaScript from bundling or defer transformations.

## Resources

- Website: [https://hexabot.ai](https://hexabot.ai)
- Documentation: [https://docs.hexabot.ai](https://docs.hexabot.ai)
- Main Hexabot repository: [https://github.com/hexabot-ai/hexabot](https://github.com/hexabot-ai/hexabot)
- WordPress plugin page: [https://fr.wordpress.org/plugins/hexabot-chat-widget/](https://fr.wordpress.org/plugins/hexabot-chat-widget/)
- Community forum: [https://community.hexabot.ai](https://community.hexabot.ai)
- Plugin repository: [https://github.com/hexabot-ai/hexabot-wordpress-live-chat-widget](https://github.com/hexabot-ai/hexabot-wordpress-live-chat-widget)
- Generic widget guide: [https://docs.hexabot.ai/faq/how-can-i-add-the-chat-widget-to-my-website](https://docs.hexabot.ai/faq/how-can-i-add-the-chat-widget-to-my-website)

## Contributing

Issues and pull requests are welcome in this repository. For platform-level questions, workflow examples, and community support, use the [Hexabot community forum](https://community.hexabot.ai).

## Changelog

### 3.2.2

- Updated bundled widget assets to `@hexabot-ai/widget` 3.2.2.
- Migrated WordPress settings to Hexabot v3 Web Source and Source Ref integration.
- Added optional Workflow ID, primary color, transport mode, language, and max upload size settings.
- Updated documentation and links for Hexabot v3.

## License

This WordPress plugin is licensed under the GNU Affero General Public License v3.0 (AGPLv3).

Hexabot v3 itself uses the FCL-1.0-ALv2 fair-core license. See the [main Hexabot repository](https://github.com/hexabot-ai/hexabot) for full platform licensing details.
