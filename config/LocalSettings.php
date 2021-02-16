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
$useHttps = true;
$domainUrl = ($useHttps ? 'https' : 'http') . '://' . $domainName;
$emailSender = 'dev' === $env ? 'bertrand.gorge@neayi.com' : 'no-reply@tripleperformance.com';
$parsoidDomain = $env; // dev, prod, preprod

// =================================================================

## Uncomment this to disable output compression
$wgDisableOutputCompression = !$debug;

$wgSitename = "Wiki Triple Performance";
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

## The protocol and server name to use in fully-qualified URLs
$wgServer = $domainUrl;

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

$wgEmergencyContact = "bertrand.gorge@neayi.com";
$wgPasswordSender = $emailSender;

$wgEnotifUserTalk = 'prod' === $env; # UPO
$wgEnotifWatchlist = 'prod' === $env; # UPO
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

# PDFHandler in order to build thumbnails for PDFs
wfLoadExtension( 'PdfHandler' );

# End of automatically generated settings.
# Add more configuration options below.

if('prod' === $env) {
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

    // SEO and Sitemap
    // https://www.mediawiki.org/wiki/Extension:AutoSitemap
    wfLoadExtension( 'AutoSitemap' ); 
    $wgAutoSitemap["notify"] = [];

    $wgAutoSitemap["notify"][] = "https://www.google.com/webmasters/sitemaps/ping?sitemap=$domainUrl/sitemap.xml";
    $wgAutoSitemap["notify"][] = "https://www.bing.com/webmaster/ping.aspx?sitemap=$domainUrl/sitemap.xml";

    $wgAutoSitemap["freq"] = "weekly"; //default
    $wgAutoSitemap["priority"][NS_MAIN] = 1;
    $wgAutoSitemap["priority"][NS_CATEGORY] = 0.8;

    wfLoadExtension( 'HeadScript' );
    $wgHeadScriptCode = <<<'START_END_MARKER'
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

if($debug) {
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-tripleperformance-variables.scss');
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/chameleon-neayi.scss');
    \Bootstrap\BootstrapManager::getInstance()->addCacheTriggerFile(dirname(MW_CONFIG_FILE) . '/skins/skin-neayi/_caracteristiques_exploitation.scss');
}

// Database and cross referencing
wfLoadExtension( 'DynamicPageList' );

// Scripting and parsing
wfLoadExtension( 'Loops' );
wfLoadExtension( 'Variables' );
wfLoadExtension( 'Scribunto' );
$wgScribuntoDefaultEngine = 'luastandalone';

// Neayi's extensions
wfLoadExtension( 'PDFDownloadCard' );

require_once "$IP/extensions/Carousel/Carousel.php";
//$wgCarouselDisableMouseOver = true;

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

wfLoadExtension( 'TextExtracts' );
wfLoadExtension( 'Description2' );
$wgEnableMetaDescriptionFunctions = true;
wfLoadExtension( 'OpenGraph' );

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

// Echo
wfLoadExtension( 'Echo' );
$wgEchoUseJobQueue = true;

$wgEnotifMinorEdits = false;
$wgEnotifUseRealName = true;

// https://www.mediawiki.org/wiki/Extension:EditNotify
$wgEditNotifyAlerts = array(
	array(
		'action' => array( 'create', 'edit' ),
		'users' => array('Bertrand_Gorge')
	)
);

// Neayi login
wfLoadExtension( 'PluggableAuth' );
wfLoadExtension( 'NeayiAuth' );

$wgOAuthRedirectUri = "$domainUrl/index.php/Special:PluggableAuthLogin";
$wgPluggableAuth_EnableAutoLogin = false;
$wgPluggableAuth_EnableLocalLogin = false;

$wgOAuthUri = getenv('INSIGHT_URL') . '/login?&';

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
//wfLoadExtension( 'VEForAll' );

// Disambiguator
wfLoadExtension( 'Disambiguator' );

// Hit counter
wfLoadExtension( 'HitCounters' );

// InputBox to have a search input on the home page
wfLoadExtension( 'InputBox' );

// Add categories to pages quickly
wfLoadExtension( 'MassEditRegex' );
$wgGroupPermissions['sysop']['masseditregex'] = true;

// Semantic Mediawiki
enableSemantics( 'tripleperformance.fr' );
$smwgConfigFileDir = $wgUploadDirectory;

// Load the geo localisation SMW extension:
// https://maps.extension.wiki/wiki/Installation
wfLoadExtension( 'Maps' );
$egMapsDefaultService = 'leaflet';

wfLoadExtension( 'SemanticResultFormats' );

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
