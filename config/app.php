<?php

return [
    /*
	*
	*CUSTOM APP VARIABLES
	*/
	//
	// 'webService' => 'http://192.168.88.21:7447/DKUT/WS/TEST/Codeunit/AdmissionWebportal',
	// 'wsWebportal' => 'http://192.168.88.21:7447/DKUT/WS/TEST/Codeunit/Webportal',
    // 'odataBaseUrl' => "http://192.168.88.21:7448/DKUT/ODataV4/Company('TEST')/", 

    'webService' => 'http://desktop-vb770fl:7047/BC250/WS/CRONUS%20International%20Ltd./Codeunit/HospitalWebPortal',
	// 'wsWebportal' => 'http://192.168.88.21:7447/DKUT/WS/TEST/Codeunit/Webportal',
    'odataBaseUrl' => "http://desktop-vb770fl:7048/BC250/ODataV4/Company('CRONUS%20International%20Ltd.')/", 
	//
	'googleCaptchaId' => env('APP_ENV') == "production"? '6LfuMigbAAAAAEiPZAEVI-KokIpeVpnPLEg9GxaX':'##',
	// 'storagePath' => env('APP_ENV') == "production"? '\\\\192.168.35.53\\c$\\DBs\\Portal Attachments\\':'##',
	'storagePath' => env('APP_ENV') == "production"? '\\\\192.168.88.21\\C$\\PORTALS\\Attachments':'##',
     'storagePath2' => '\\\\192.168.88.22\\C$\\PORTALS\\DEKUT Portals\\DeKUT_Online_App\\public\\Attachments',
    //'storagePath2' => 'C:\\PORTALS\\2026\\January\\DeKUT_Online_App\\public\\Attachments',

    'storagePaths' => [
        'passports' => ["storePath" => "passports/images", "readPath" => "storage/passports/images"],
    ],
    //dsl0\Administrator:P###$$w0rdd.2420
	// 'reportsPath' => env('APP_ENV') == "production"? '\\\\192.168.35.54\\C$\\Portals\\Attachments\\':'##',
	'reportsPath' => env('APP_ENV') == "production"? '\\\\192.168.7.153\\c$\\DBs\\Portal Reports\\':'\\\\192.168.7.153\\c$\\DBs\\Portal Reports\\',
	'domainUser' => 'desktop-vb770fl\\dsl:Petra',
	'Credentials' => 'desktop-vb770fl\\dsl:Petra',
    'senderEmail' => env('MAIL_USERNAME'),
    'kenyanNationalityCode' => 'KE',
    'kenyanNationalityCode2' => 'KENYA',
    'webServiceDebug' => env('WEBSERVICE_DEBUG'),
    'dbCompanyName' => env('DB_COMPANY_NAME'),
    'company' => [
        'name' => env('COMPANY_NAME'),
        'website' => 'http://www.dekut.ac.ke',
        'email' => 'info@dekut.ac.ke',
    ],
	'metaDescription' => env('APP_NAME')." for ".env('COMPANY_NAME').". You can quickly and conveniently submit your admission application online and keep track of the application progress until you can download and print your admission letter.",
    'metaKeywords' => "university,college,campus,best university in kenya,top university in kenya,best univerity,top university",
    'error' => [
        'general' => 'Oops! something went wrong. Please try again. If the problem persists, please contact the IT team.',
        'webService' => "Oops! a web services error occurred, please try again. If the problem persists, please contact the IT team.",
        'notFound' => "Oops! not found.",
        'saving' => "Oops! something went wrong while trying to save data. Please try again. If the problem persists, please contact the IT Team.",
        'persistent' => " Please try again. If the error persists, kindly contact us for help.",
        'accessDenied' => "Access denied. It seems you don't have permission to continue with this action. Contact the IT Team.",
    ],
    'errorsReceiver' => '#',
    'storage' => [
        'companyInfo' => ['save' => '', 'read' => ''],
        'qualifications' => ['save' => '', 'read' => ''],
        'photos' => ['save' => '', 'read' => ''],
    ],
    'activation' => [
        'application' => 1,
        'registration' => 1,
        'hostel' => 0,
        'requisition' => 0,
    ],


    'lifetime' => 240,

    'mpesa' => [
        'MPESA_ENV' => env('MPESA_ENV', 0),
        'MPESA_CONSUMER_KEY' => env('MPESA_CONSUMER_KEY', '92ao5ulsLuA---30JHr33Hd3oI'),
        'MPESA_CONSUMER_SECRET' => env('MPESA_CONSUMER_SECRET', 'L81vDV----qaG0P0y3I'),
        'MPESA_SHORTCODE' => env('MPESA_SHORTCODE', '4095113'),
        'MPESA_STK_SHORTCODE' => env('MPESA_STK_SHORTCODE', '4095113'),
        'MPESA_PASSKEY' => env('MPESA_PASSKEY', '40951138c3dca6----------------fd4e80bb0945dc'),
    ],
    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'DEKUT'),
    'full_name' => 'Dedan Kimathi University of Technology',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL', null),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Arr' => Illuminate\Support\Arr::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Http' => Illuminate\Support\Facades\Http::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'Str' => Illuminate\Support\Str::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,

    ],

];
