<?php

# This file was automatically generated by the MediaWiki 1.32.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

// =================================================================

$env = getenv('ENV') ?: 'prod'; // dev, prod, preprod
$debug = false === getenv('DEBUG') ? 'dev' === $env : 'true' === strtolower((string) getenv('DEBUG')); // true, false
$domainName = getenv('DOMAIN_NAME') ?: 'wiki.tripleperformance.fr'; // pratiques.dev.tripleperformance.fr, wiki.preprod.tripleperformance.fr
$useHttps = false;
$domainUrl = ($useHttps ? 'https' : 'http') . '://' . $domainName;
$emailSender = 'no-reply@tripleperformance.com';
$parsoidDomain = $env; // dev, prod, preprod

// =================================================================

## Uncomment this to disable output compression
$wgDisableOutputCompression = !$debug;

$wgSitename = "Triple Performance";
$wgMetaNamespace = "Triple_Performance";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";

$wgScriptExtension = ".php";
$wgArticlePath = "/wiki/$1";
$wgUsePathInfo = true;
$wgForceHTTPS = $useHttps;
$wgCanonicalServer = $domainUrl;

## The protocol and server name to use in fully-qualified URLs
$wgServer = '//' . $domainName;

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "/skins/skin-neayi/favicon/logo-triple-performance.svg";
$wgAppleTouchIcon = "/skins/skin-neayi/favicon/apple-touch-icon.png";
$wgFavicon = "/skins/skin-neayi/favicon/favicon.ico";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO
if ($env == 'preprod')
    $wgEnableEmail = false; // Disable emails on preprod please.
$wgAllowHTMLEmail = true;

$wgEmergencyContact = "bertrand.gorge@neayi.com";
$wgPasswordSender = $emailSender;

$wgEnotifUserTalk = false;
$wgEnotifWatchlist = true;
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";

## Database settings
$wgDBserver = getenv('MYSQL_HOST');
$wgDBname = getenv('MYSQL_DB');
$wgDBuser = getenv('MYSQL_USER');
$wgDBpassword = getenv('MYSQL_PASSWORD');

# MySQL specific settings
$wgDBprefix = getenv('MYSQL_DB_PREFIX');

// @see https://www.mediawiki.org/wiki/Manual:$wgSecretKey
$wgSecretKey = getenv('SECRET_KEY');

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
// @see https://www.mediawiki.org/wiki/Manual:$wgUpgradeKey
$wgUpgradeKey = getenv('UPGRADE_KEY');


// To configure ElasticSearch passwords, see:
// @see https://www.elastic.co/fr/blog/getting-started-with-elasticsearch-security
// @see https://discuss.elastic.co/t/setting-xpack-security-enabled-true/182791/7
// ./bin/elasticsearch-setup-passwords auto -u "http://localhost:9200"
$wgCirrusSearchServers = array_filter([ getenv('ELASTICSEARCH_SERVER') ]);

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true; // disable on OVH https://www.mediawiki.org/wiki/Topic:Uysful50s28egg8a
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgFileExtensions[] = 'svg';
$wgSVGConverter = 'ImageMagick';

$wgAllowExternalImages = true;

// Maximum amount of virtual memory available to shell processes under Linux, in KiB.
$wgMaxShellMemory = 614400;

// Allow PDF
$wgFileExtensions[] = 'pdf';

$wgUploadDirectory = "{$IP}/images";
$wgTmpDirectory = "{$wgUploadDirectory}/temp";
$wgImageMagickTempDir = "{$wgUploadDirectory}/temp";
$wgAttemptFailureEpoch = 30;

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgGenerateThumbnailOnParse = true;

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Open external links in new windows
$wgExternalLinkTarget = '_blank';

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory = "{$wgUploadDirectory}/temp/wiki";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "fr";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Define custome namespaces
define("NS_STRUCTURE", 3000); // This MUST be even.
define("NS_STRUCTURE_TALK", 3001); // This MUST be the following odd integer.

// Add namespaces.
$wgExtraNamespaces[NS_STRUCTURE] = "Structure";
$wgExtraNamespaces[NS_STRUCTURE_TALK] = "Structure_talk"; // Note underscores in the namespace name.
$wgContentNamespaces[] = NS_STRUCTURE;
$wgContentNamespaces[] = NS_CATEGORY;
$wgContentNamespaces[] = NS_STRUCTURE;
$wgNamespacesToBeSearchedDefault[NS_STRUCTURE] = true;
$wgNamespacesToBeSearchedDefault[NS_CATEGORY] = true;
$wgNamespacesToBeSearchedDefault[NS_STRUCTURE] = true;

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = true;
$wgGroupPermissions['*']['edit'] = false;

# Enabled extensions. Most of the extensions are enabled by adding
# wfLoadExtensions('ExtensionName');
# to LocalSettings.php. Check specific extension documentation for more details.
# The following extensions were automatically enabled:
wfLoadExtension( 'MultimediaViewer' );
wfLoadExtension( 'ParserFunctions' );
$wgPFEnableStringFunctions = true;
$wgPFStringLengthLimit = 1500;

wfLoadExtension( 'Link_Attributes' );

# PDFHandler in order to build thumbnails for PDFs
wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'PDFEmbed' );

# End of automatically generated settings.
# Add more configuration options below.

// Semantic Mediawiki
enableSemantics( 'tripleperformance.fr' );
$smwgConfigFileDir = $wgUploadDirectory;
$smwgNamespacesWithSemanticLinks[NS_STRUCTURE] = true;

// https://github.com/SemanticMediaWiki/SemanticExtraSpecialProperties/blob/master/docs/configuration.md
wfLoadExtension( 'SemanticExtraSpecialProperties' );
$sespgEnabledPropertyList = [
    '_PAGEID',
    '_CUSER',
    '_EUSER',
    '_VIEWS',
    '_PAGELGTH',
    '_NREV',
    '_PAGEIMG'
];
$sespgUseFixedTables = true;
$sespgExcludeBotEdits = true;

// SEO and Sitemap
// https://www.mediawiki.org/wiki/Extension:AutoSitemap
wfLoadExtension( 'AutoSitemap' );
$wgAutoSitemap["notify"] = [];

$wgAutoSitemap["freq"] = "weekly"; //default
$wgAutoSitemap["priority"][NS_MAIN] = 1;
$wgAutoSitemap["priority"][NS_CATEGORY] = 0.8;
$wgAutoSitemap["server"] = 'https://' . $domainName;

// Exclude SMW namespaces: https://www.semantic-mediawiki.org/wiki/Help:Namespaces
$wgAutoSitemap["exclude_namespaces"] = [NS_TALK,
                                        NS_USER,
                                        NS_USER_TALK,
                                        NS_PROJECT_TALK,
                                        NS_MEDIAWIKI,
                                        NS_MEDIAWIKI_TALK,
                                        NS_TEMPLATE,
                                        NS_TEMPLATE_TALK,
                                        NS_HELP,
                                        NS_HELP_TALK,
                                        NS_CATEGORY_TALK,
                                        SMW_NS_CONCEPT,
                                        SMW_NS_CONCEPT_TALK,
                                        SMW_NS_PROPERTY,
                                        SMW_NS_PROPERTY_TALK,
                                        SMW_NS_RULE,
                                        SMW_NS_RULE_TALK,
                                        SMW_NS_SCHEMA,
                                        SMW_NS_SCHEMA_TALK];

// Add some color to the browser (in mobile mode)
wfLoadExtension( 'HeadScript' );
$wgHeadScriptCode = '<meta name="theme-color" content="#15A072">';

if('prod' === $env) {
    $wgEnableCanonicalServerLink = true;

    // https://www.mediawiki.org/wiki/Extension:GTag
    // https://mwusers.org/files/file/4-gtag/
    // https://github.com/SkizNet/mediawiki-GTag
    wfLoadExtension( 'GTag' );
    $wgGTagAnalyticsId  = 'UA-116409512-5';

    // If true, insert tracking code into sensitive pages such as Special:UserLogin and Special:Preferences. If false, no tracking code is added to these pages.
    $wgGTagTrackSensitivePages = true;

    // Use 'gtag-exempt' permission to exclude specific user groups from web analytics, e.g.
    $wgGroupPermissions['sysop']['gtag-exempt'] = true;
    $wgGroupPermissions['bot']['gtag-exempt'] = true;
    $wgGroupPermissions['bureaucrat']['gtag-exempt'] = true;

    // Only notify on production servers
    $wgAutoSitemap["notify"][] = "https://www.google.com/webmasters/sitemaps/ping?sitemap=$domainUrl/sitemap.xml";
    $wgAutoSitemap["notify"][] = "https://www.bing.com/webmaster/ping.aspx?sitemap=$domainUrl/sitemap.xml";

    $wgHeadScriptCode .= <<<'START_END_MARKER'
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '705673526999195');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=705673526999195&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <script type="text/javascript">
    _linkedin_partner_id = "2661170";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script><script type="text/javascript">
    (function(){var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})();
    </script>
    <noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=2661170&fmt=gif" />
    </noscript>
START_END_MARKER;
}
else
{
    // Avoid being indexed on non production environments
    $wgDefaultRobotPolicy = 'noindex,nofollow';
}

// Cookies
$wgCookieExpiration = 180 * 86400; // 180 days
$wgExtendedLoginCookieExpiration = null;
$wgDefaultUserOptions['rememberpassword'] = 1;
$wgHooks['AuthChangeFormFields'][] = function ($requests, $fieldInfo, &$formDescriptor, $action) {
    $formDescriptor['rememberMe'] = ['type' => 'check', 'default' => true];
    return true;
  };

// https://www.mediawiki.org/wiki/Manual:$wgFixDoubleRedirects
$wgFixDoubleRedirects = true;

// Chameleon
wfLoadExtension( 'Bootstrap' );
wfLoadSkin( 'chameleon' );
$wgDefaultSkin='chameleon';

$egChameleonLayoutFile = dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/layoutNeayi.xml';
$egChameleonExternalStyleModules = array(
    dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-tripleperformance-variables.scss' => 'afterVariables',
    dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-neayi.scss' => 'afterMain'
);

// Allow custom CSS on Special Pages :
$wgAllowSiteCSSOnRestrictedPages = true;

if($debug) {
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-tripleperformance-variables.scss');
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-neayi.scss');
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/_caracteristiques_exploitation.scss');
}

$egChameleonExternalStyleVariables = [
    'primary' => '#15A072'
];

// Database and cross referencing
wfLoadExtension( 'DynamicPageList' );

// Scripting and parsing
wfLoadExtension( 'Loops' );
wfLoadExtension( 'Variables' );
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

wfLoadExtension( 'SemanticScribunto' );

// Neayi's extensions
wfLoadExtension( 'Carousel' );

// CirrusSearch
wfLoadExtension( 'Elastica' );
wfLoadExtension( 'CirrusSearch' );
// $wgDisableSearchUpdate = true; // set this to stop cirrus from indexing pages
// $wgCirrusSearchServers = [ 'elasticsearch' ];
$wgSearchType = 'CirrusSearch';

// Store cache objects in Redis
$wgObjectCaches['redis'] = [
   'class' => 'RedisBagOStuff',
   'servers' => [
           'redis:6379'
   ],
   'persistent' => true,
];
$wgMainCacheType = 'redis';
$wgSessionCacheType = 'redis';
$wgCirrusSearchUseCompletionSuggester = 'yes';
$wgCirrusSearchCompletionSettings = 'fuzzy-subphrases';
$wgCirrusSearchPhraseSuggestProfiles = 'default';
$wgCirrusSearchCompletionSuggesterSubphrases = [
   'build' => true,
   'use' => true,
   'type' => 'anywords',
   'limit' => 10,
];
$wgCirrusSearchCompletionSuggesterUseDefaultSort = true;

// More parser functions
wfLoadExtension( 'EmbedVideo' );

// Related Articles (shows related articles at the bottom of the page)
wfLoadExtension( 'RelatedArticles' );
$wgRelatedArticlesFooterWhitelistedSkins = ['chameleon'];
$wgRelatedArticlesUseCirrusSearch = true;

// OpenGraph extensions:
wfLoadExtension( 'PageImages' );
$wgPageImagesBlacklist = array(
	// Page on local wiki
	array(
		'type' => 'db',
		'page' => 'MediaWiki:Pageimages-blacklist',
		'db' => false,
	),
);
// Bump the score of the first image
$wgPageImagesScores['position'] = [ 99, 6, 4, 3 ];

wfLoadExtension( 'TextExtracts' );
wfLoadExtension( 'Description2' );
$wgEnableMetaDescriptionFunctions = true;

wfLoadExtension( 'OpenGraphMeta' );

wfLoadExtension( 'UrlShortener' );
$wgUrlShortenerTemplate = '/r/$1';
$wgUrlShortenerServer = "3perf.fr";
$wgUrlShortenerAllowedDomains = array(
	'(.*\.)?tripleperformance\.fr'
);

// Popups (shows a preview of the page on hover)
wfLoadExtension( 'Popups' );
$wgPopupsHideOptInOnPreferencesPage = true;
$wgPopupsOptInDefaultState = '1';
$wgPopupsReferencePreviewsBetaFeature = false;

// Allow to change the Author of an article
wfLoadExtension( 'ChangeAuthor' );
$wgGroupPermissions['sysop']['changeauthor'] = true; // Only sysops can use ChangeAuthor. This is the recommended setup
$wgGroupPermissions['bureaucrat']['changeauthor'] = true; // Only bureaucrats can use ChangeAuthor


// References and citations
wfLoadExtension( 'Cite' );

// https://www.mediawiki.org/wiki/Extension:CommentStreams
wfLoadExtension( 'CommentStreams' );
$wgAllowDisplayTitle = true;
$wgRestrictDisplayTitle = false;
$wgCommentStreamsEnableVoting = true;
$wgCommentStreamsEnableWatchlist = false;
$wgDefaultUserOptions["echo-subscriptions-email-commentstreams-notification-category"] = true; // enable email notifications
$wgDefaultUserOptions["echo-subscriptions-web-commentstreams-notification-category"] = true; // enable web notifications
$wgGroupPermissions['csmoderator']['cs-moderator-edit'] = true;
$wgCommentStreamsModeratorFastDelete = true;
$wgCommentStreamsUserAvatarPropertyName = "A un avatar";
$wgInsightsRootURL = getenv('INSIGHT_URL') . '/';
$wgInsightsRootURLPHP= str_replace('https', 'http', getenv('INSIGHT_URL')) . '/';

wfLoadExtension( 'NeayiInteractions' );
wfLoadExtension( 'NeayiNavbar' );
wfLoadExtension( 'NeayiIntroJS' );

// Echo
wfLoadExtension( 'Echo' );
$wgEchoUseJobQueue = true;
$wgEchoEmailFooterAddress = "<div style=\"padding: 100px 0 0 0; text-align:center\"><img src=\"https://wiki.tripleperformance.fr/images/1/1a/Logo_Triple_Performance.png\" width=\"300\"></div>";

$wgEnotifMinorEdits = false;
$wgEnotifUseRealName = true;

// Neayi login
wfLoadExtension( 'PluggableAuth' );
wfLoadExtension( 'NeayiAuth' );

$wgOAuthRedirectUri = 'https://' . $domainName . "/index.php/Special:PluggableAuthLogin";
$wgPluggableAuth_EnableAutoLogin = false;
$wgPluggableAuth_EnableLocalLogin = false;

$wgOAuthUri = getenv('INSIGHT_URL') . '/register?&';
//$wgOAuthUri = getenv('INSIGHT_URL') . '/login?&';

if ($env == 'preprod')
    $wgOAuthUserApiByToken = 'http://insights_preprod/api/user?&';
else
    $wgOAuthUserApiByToken = 'http://insights/api/user?&';

$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgUseCombinedLoginLink = true;
$wgAvatarsBaseUri = getenv('INSIGHT_URL') . '/storage/users/';

// Realnames
wfLoadExtension( 'Realnames' );
$wgRealnamesLinkStyle = 'replace';

// Delete several pages in one shot
wfLoadExtension( 'DeleteBatch' );
$wgGroupPermissions['sysop']['deletebatch'] = true;

// VisualEditor
wfLoadExtension( 'VisualEditor' );
$wgVisualEditorTabMessages['editsource'] = null;
$wgVisualEditorTabMessages['createsource'] = null;

// Enable by default for everybody
$wgDefaultUserOptions['visualeditor-enable'] = 1;

$wgVisualEditorEnableWikitext = true;
$wgDefaultUserOptions['visualeditor-newwikitext'] = 1;
$wgHiddenPrefs[] = 'visualeditor-newwikitext';

$wgVirtualRestConfig['modules']['parsoid'] = array(
    // URL to the Parsoid instance
    // Use port 8142 if you use the Debian package
    'url' => 'http://parsoid:8000',
    // Parsoid "domain", see below (optional)
    'domain' => $parsoidDomain,
);

// Page forms and template data
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'PageForms' );
$wgPageFormsLinkAllRedLinksToForms = true;
$wgPageFormsAutocompleteOnAllChars = true;

wfLoadExtension( 'SemanticFormsSelect' );

wfLoadExtension( 'UploadWizard' );
$wgUseInstantCommons = true;
$wgUploadNavigationUrl = '/wiki/Special:UploadWizard';
$wgUploadWizardConfig = array(
    'autoAdd' => array(
        //  'wikitext' => array(
        //     'This file was uploaded with the UploadWizard extension.'
        //     ),
            'categories' => array(
                "Fichier chargé avec l'assistant UploadWizard"
                ),
        ), // Should be localised to the language of your wiki instance
//        'feedbackPage' => 'Feedback about UploadWizard',
//    'altUploadForm' => 'Special:Upload',
    'feedbackLink' => false, // Disable the link for feedback (default: points to Commons)
    'alternativeUploadToolsPage' => false, // Disable the link to alternative upload tools (default: points to Commons)
    'enableFormData' => true, // Enable FileAPI uploads be used on supported browsers
    'enableMultipleFiles' => true,
    'enableMultiFileSelect' => false,
    'uwLanguages' => array(
        'fr' => 'Français',
        'en' => 'English',
        'de' => 'Deutsch'
        ), // Selectable languages for file descriptions - defaults to 'en'
    'tutorial' => array(
            'skip' => true
        ), // Skip the tutorial
    'maxUploads' => 15, // Number of uploads with one form - defaults to 50
    'fileExtensions' => $wgFileExtensions // omitting this may cause errors
    );


// https://www.mediawiki.org/wiki/Extension:VEForAll
wfLoadExtension( 'VEForAll' );

// Disambiguator
wfLoadExtension( 'Disambiguator' );

wfLoadExtension( 'AdminLinks' );


// Hit counter
wfLoadExtension( 'HitCounters' );

// InputBox to have a search input on the home page
wfLoadExtension( 'InputBox' );

// https://www.mediawiki.org/wiki/Extension:Replace_Text
wfLoadExtension( 'ReplaceText' );

// Load the geo localisation SMW extension:
// https://maps.extension.wiki/wiki/Installation
wfLoadExtension( 'Maps' );
$egMapsDefaultService = 'leaflet';

wfLoadExtension( 'SemanticResultFormats' );

wfLoadExtension( 'CategoryTree' );
$wgCategoryTreeMaxDepth = 4;

require_once "$IP/extensions/SemanticDrilldown/SemanticDrilldown.php";
// Uncomment the two following in order to show tag clouds instead of simple links
// $sdgFiltersSmallestFontSize=9;
// $sdgFiltersLargestFontSize=25;
$sdgHideCategoriesByDefault = true;

$slackWebHook = getenv('SLACK_WEBHOOK');
if (!empty($slackWebHook))
{
    // https://github.com/kulttuuri/SlackNotifications
    wfLoadExtension( 'SlackNotifications' );
    $wgSlackIncomingWebhookUrl = $slackWebHook;
    $wgSlackFromName = "Triple Performance";
    $wgSlackNotificationWikiUrl = "https://wiki.tripleperformance.fr/";
    $wgSlackNotificationWikiUrlEnding = "index.php?title=";
    $wgSlackIncludePageUrls = true;
    $wgSlackIncludeUserUrls = false;
    $wgSlackIgnoreMinorEdits = true;
    $wgSlackEmoji = ":tripleperformance:";
    $wgSlackExcludedPermission = "bot"; // bots and admin
}

// https://www.mediawiki.org/wiki/Extension:RottenLinks
wfLoadExtension( 'RottenLinks' );

// Debug and error reporting :

if ($debug) {
// error_reporting( -1 );
// ini_set( 'display_errors', 1 );
// $wgDebugLogFile = __DIR__ . '/debug.log';
// $wgShowDebug = true;

    $wgShowExceptionDetails = true;
    $wgDebugToolbar = true;
    $wgResourceLoaderDebug = true;
}
