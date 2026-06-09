=== Hexabot Chat Widget ===
Contributors: Hexastack
Tags: ai chatbot, conversational ai, chat widget, customer support, automation
Requires at least: 5.6
Tested up to: 6.6
Stable tag: 3.2.2
Requires PHP: 7.4
License: AGPLv3
License URI: https://www.gnu.org/licenses/agpl-3.0.html

Add a self-hosted conversational AI chatbot for WordPress with Hexabot v3 workflows for support, lead capture, onboarding, and engagement.

== Description ==

The **Hexabot Chat Widget** plugin helps WordPress site owners add a self-hosted AI chatbot to their website in minutes. It embeds the Hexabot v3 conversational AI widget on your public pages and connects visitors to Hexabot-powered workflows for support, lead capture, onboarding, and customer engagement.

[Hexabot](https://hexabot.ai/) v3 is a self-hosted, fair-core AI automation platform for building conversational workflows that talk, act, and remember. It can power a website AI assistant, a customer support chatbot, lead qualification flows, product onboarding, internal operations, and other AI workflow automation use cases across web chat and additional channels.

This chatbot plugin for WordPress handles the website embed for you, so no theme-file editing is required. Configure the visitor experience in Hexabot Admin, then connect WordPress by entering two values in **Settings > Hexabot Chat Widget**:

- **API URL**: the public URL of your Hexabot v3 API.
- **Source Ref**: the reference for the Hexabot v3 Web Source created for this WordPress website.

The Web Source controls website-specific behavior such as allowed domains, default workflow, greeting, window title, avatar, menu, upload permissions, and interaction options. The WordPress settings connect your site to that Web Source and let you apply client-side overrides such as workflow routing, primary color, language, transport mode, and upload size.

Learn more in the [official Hexabot repository](https://github.com/hexabot-ai/hexabot).

### Key Features:
- Embed Hexabot Chat Widget on your WordPress website.
- Connect WordPress to Hexabot v3 using API URL and Source Ref.
- Run conversational AI workflows from a WordPress chat widget.
- Use the widget as an AI chatbot for WordPress, website AI assistant, customer support chatbot, or lead capture assistant.
- Optionally route visitors to a specific workflow with Workflow ID.
- Customize the primary widget color from the WordPress admin panel.
- Configure the widget language.
- Choose WebSocket or polling transport.
- Set a client-side upload size limit.
- Add the widget with no theme-file editing required.
- Works with self-hosted Hexabot v3 instances.
- Use bundled local widget assets for WordPress review compatibility.

Typical use cases include AI customer support, FAQ automation, lead capture, sales qualification, onboarding flows, appointment or request intake, and guided self-service experiences.

Configuration happens in two places:

1. In Hexabot Admin, create or select a **Web Source** for this website and configure allowed domains, source behavior, and default workflow.
2. In WordPress, open **Settings > Hexabot Chat Widget** and enter the Hexabot API URL and Source Ref.

== Installation ==

1. Install **Hexabot Chat Widget** from the WordPress plugins screen, or upload the plugin files to the `/wp-content/plugins/hexabot` directory.
2. Activate the plugin through the **Plugins** screen in WordPress.
3. Open Hexabot Admin for your Hexabot v3 instance.
4. Create or select a **Web Source** for this WordPress website.
5. Add your WordPress domain to the Web Source allowed domains.
6. Copy the Web Source **Source Ref**.
7. In WordPress, go to **Settings > Hexabot Chat Widget**.
8. Enter the Hexabot **API URL** and **Source Ref**.
9. Optionally set a Workflow ID, primary color, transport mode, language, and max upload size.
10. Save changes and open your website to test the widget.

== Frequently Asked Questions ==

= What is Hexabot? =
Hexabot v3 is a self-hosted, fair-core conversational AI and workflow automation platform. It lets teams build AI-powered workflows that can answer questions, collect information, trigger actions, and guide users across web chat and other channels.

= Do I need a Hexabot instance? =
Yes. This plugin connects WordPress to Hexabot v3. You need a running Hexabot instance, a Web Source configured for your website, and the Source Ref for that Web Source.

= Is this a live chat plugin? =
It adds a chat widget to your WordPress website, but Hexabot is not only a live chat tool. The plugin connects your website chat experience to conversational AI workflows and automation built in Hexabot.

= Can I use it for AI customer support? =
Yes. You can use Hexabot to build a customer support chatbot, FAQ assistant, onboarding assistant, or guided support workflow, then embed that experience on WordPress with this plugin.

= Can I use it for lead capture? =
Yes. You can build a Hexabot workflow that asks qualifying questions, collects visitor details, and routes the conversation according to your business process.

= What is a Source Ref? =
A Source Ref is the reference for a Hexabot v3 Web Source. The Web Source represents your website connection in Hexabot Admin. This plugin passes the Source Ref to the widget as `sourceId` so visitor conversations reach the correct Hexabot Web Source.

= Does it work with self-hosted Hexabot? =
Yes. The plugin is designed to connect WordPress to self-hosted Hexabot v3 instances. Enter the public API URL for your Hexabot deployment and the Source Ref for your Web Source.

= Does it require coding? =
No theme-file editing or custom embed code is required. Configure the Web Source in Hexabot Admin, then enter the API URL and Source Ref in **Settings > Hexabot Chat Widget**.

= How do I configure the chat widget settings? =
There are two settings areas:

1. In Hexabot Admin, configure the Web Source itself: allowed domains, default workflow, greeting message, window title, avatar, persistent menu, file/location/emoji toggles, allowed upload MIME types, thread inactivity, and other source behavior.
2. In WordPress, use **Settings > Hexabot Chat Widget** to connect this site to that Web Source: API URL, Source Ref, optional Workflow ID, optional primary color, transport mode, language, and max upload size.

= What happened to the v2 connection settings? =
Hexabot v3 uses source-based website integration. Instead of the old v2 connection fields, create a Web Source in Hexabot Admin and paste its Source Ref into WordPress.

= Can I use the plugin with a custom Hexabot installation? =
Yes. Set the API URL to your self-hosted Hexabot v3 API and configure the Source Ref from that Hexabot instance.

= Where do I find the Source Ref? =
Create or select an enabled Web Source in Hexabot Admin, then copy the Source Ref from the source configuration. The widget uses this value as `sourceId` to connect visitor conversations to the right Web Source.

= Where do I configure allowed domains and widget behavior? =
Configure those in the Hexabot Web Source, not in WordPress. Add your WordPress site URL to the source allowed domains, then configure the greeting, title, avatar, menu, allowed upload MIME types, and interaction toggles there. Max upload size is a widget client setting and should also be enforced in the Hexabot API upload configuration.

== Documentation ==

To learn more about Hexabot and the Hexabot Chat Widget for WordPress, see:
https://docs.hexabot.ai/faq/how-can-i-add-the-chat-widget-to-my-website

- Website: https://hexabot.ai
- Official Documentation: https://docs.hexabot.ai
- GitHub repo for this plugin: https://github.com/hexabot-ai/hexabot-wordpress-live-chat-widget
- GitHub repo for Hexabot: https://github.com/hexabot-ai/hexabot
- Community: https://community.hexabot.ai

== Changelog ==

= 3.2.2 =
* Add Hexabot v3 Source Ref support for Web Source integration.
* Update bundled widget assets to @hexabot-ai/widget 3.2.2.
* Add API URL + Source Ref configuration for WordPress embeds.
* Add optional Workflow ID, primary color, transport, language, and max upload size settings.
* Update documentation and links for Hexabot v3.

= 2.0.1 =
* Align the plugin version with the library version.
* Apply WordPress review recommendations (JS / CSS assets are local).
* Re-use WordPress React library.

= 1.0 =
* Initial release of the Hexabot Chat Widget plugin.

== License ==

This plugin is licensed under the AGPLv3. For more details, see the license file or visit [https://www.gnu.org/licenses/agpl-3.0.html](https://www.gnu.org/licenses/agpl-3.0.html).
