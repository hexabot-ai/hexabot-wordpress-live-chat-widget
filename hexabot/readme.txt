=== Hexabot Chat Widget ===
Contributors: Hexastack
Tags: ai, automation, chatbot, conversational workflows, live chat, chat widget
Requires at least: 5.6
Tested up to: 6.6
Stable tag: 3.2.2
Requires PHP: 7.4
License: AGPLv3
License URI: https://www.gnu.org/licenses/agpl-3.0.html

Embed the Hexabot v3 chat widget into WordPress and connect visitors to AI-powered conversational workflows.

== Description ==

The **Hexabot Chat Widget** plugin embeds the Hexabot live chat widget into your WordPress website. It connects your site to Hexabot v3 so visitors can start conversations that trigger AI automation workflows.

What is [Hexabot](https://hexabot.ai/)? Hexabot v3 is a self-hostable AI automation platform for building conversational workflows that talk, act, and remember. It can automate support, operations, and customer-facing processes across web chat and other channels.

Learn more in the [official Hexabot repository](https://github.com/hexabot-ai/hexabot).

### Key Features:
- Embed the Hexabot chat widget on all pages of your WordPress website.
- Connect the widget to a Hexabot web source using the v3 Source Ref contract.
- Optionally route visitors to a specific workflow.
- Customize the primary widget color, language, upload limit, and transport mode from the WordPress admin panel.
- Use bundled local widget assets for WordPress review compatibility.

Configure the website source, allowed domains, greeting, title, avatar, menu, allowed upload MIME types, and interaction toggles in Hexabot Admin under **Integrations/Channels** or `/settings/sources`. Configure the WordPress embed connection from **Settings > Hexabot Chat Widget**.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/hexabot` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. In Hexabot Admin, go to **Integrations/Channels** or `/settings/sources` and create or select an enabled source for this WordPress website.
4. In that Hexabot source, set the channel to `web`, configure allowed domains and source settings, then copy the Source Ref.
5. In WordPress, go to **Settings > Hexabot Chat Widget** and configure the API URL and Source Ref.
6. Optionally set a Workflow ID override, primary color override, transport mode, language, and max upload size.
7. Save changes. The widget will render only after both API URL and Source Ref are configured.

== Frequently Asked Questions ==

= How do I configure the chat widget settings? =
There are two settings areas:

1. In Hexabot Admin, use **Integrations/Channels** or `/settings/sources` to configure the web source itself: allowed domains, default workflow, greeting message, window title, avatar, persistent menu, file/location/emoji toggles, allowed upload MIME types, thread inactivity, and other source behavior.
2. In WordPress, use **Settings > Hexabot Chat Widget** to connect this site to that source: API URL, Source Ref, optional Workflow ID override, optional primary color override, transport mode, language, and max upload size.

= What happened to the v2 connection settings? =
Hexabot v3 uses source-based website integration. The plugin fixes the widget channel to `web` and passes the configured Source Ref as `sourceId` instead of using the old v2 channel and credential configuration.

= Can I use the plugin with a custom Hexabot installation? =
Yes. Set the API URL to your self-hosted Hexabot API and configure the Source Ref from that Hexabot instance.

= Where do I find the Source Ref? =
Create or select an enabled web source in Hexabot Admin under **Integrations/Channels** or `/settings/sources`, then copy the Source Ref from the source configuration. The widget uses this value as `sourceId` to connect to `/webhook/{sourceId}/`.

= Where do I configure allowed domains and widget behavior? =
Configure those in the Hexabot web source, not in WordPress. Add your WordPress site URL to the source allowed domains, then configure the greeting, title, avatar, menu, allowed upload MIME types, and interaction toggles there. Max upload size is a widget client setting and should also be enforced in the Hexabot API upload configuration.

== Documentation ==

To learn more about integrating the Hexabot widget in your WordPress website, see:
https://docs.hexabot.ai/faq/how-can-i-add-the-chat-widget-to-my-website

- Official Documentation: https://docs.hexabot.ai
- GitHub repo for this plugin: https://github.com/hexabot-ai/hexabot-wordpress-live-chat-widget
- GitHub repo for Hexabot: https://github.com/hexabot-ai/hexabot
- YouTube Channel: https://www.youtube.com/@hexabot-videos
- Discord: https://discord.gg/rNb9t2MFkG

== Changelog ==

= 3.2.2 =
* Update bundled widget assets to @hexabot-ai/widget 3.2.2.
* Migrate from v2 token/channel settings to v3 Source Ref integration.
* Add optional Workflow ID, primary color, transport, language, and max upload size settings.
* Update documentation and repository links for Hexabot v3.

= 2.0.1 =
* Align the plugin version with the library version.
* Apply WordPress review recommendations (JS / CSS assets are local).
* Re-use WordPress React library.

= 1.0 =
* Initial release of the Hexabot Chat Widget plugin.

== License ==

This plugin is licensed under the AGPLv3. For more details, see the license file or visit [https://www.gnu.org/licenses/agpl-3.0.html](https://www.gnu.org/licenses/agpl-3.0.html).
