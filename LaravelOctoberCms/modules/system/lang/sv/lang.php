<?php

return [
    'app' => [
        'name' => 'October CMS',
        'tagline' => 'Getting back to basics',
    ],
    'locale' => [
        'en' => 'English',
        'de' => 'German',
        'es' => 'Spanish',
        'es-ar' => 'Spanish (Argentina)',
        'fa' => 'Persian',
        'fr' => 'French',
        'hu' => 'Hungarian',
        'id' => 'Bahasa Indonesia',
        'it' => 'Italian',
        'ja' => 'Japanese',
        'nl' => 'Dutch',
        'pl' => 'Polish',
        'pt-br' => 'Brazilian Portuguese',
        'ro' => 'Romanian',
        'ru' => 'Russian',
        'se' => 'Swedish',
        'sk' => 'Slovak (Slovakia)',
        'tr' => 'Turkish',
        'nb-no' => 'Norska (Bokmål)'
    ],
    'directory' => [
        'create_fail' => "Kunde inte skapa mapp: :name",
    ],
    'file' => [
        'create_fail' => "Kunde inte skapa fil: :name",
    ],
    'combiner' => [
        'not_found' => "Kombinationsfilen ':name' kunde ej hittas",
    ],
    'system' => [
        'name' => 'System',
        'menu_label' => 'System',
        'categories' => [
            'cms' => 'CMS',
            'misc' => 'Övrigt',
            'logs' => 'Loggar',
            'mail' => 'Mail',
            'shop' => 'Affär',
            'team' => 'Lag',
            'users' => 'Användare',
            'system' => 'System',
            'social' => 'Social',
            'events' => 'Händelser',
            'customers' => 'Kunder',
            'my_settings' => 'Mina inställningar'
        ]
    ],
    'plugin' => [
        'unnamed' => 'Namnlöst plugin',
        'name' => [
            'label' => 'Plugin-namn',
            'help' => 'Namnge pluginet efter dess unika kod. Exempelvis RainLab.Blog',
        ],
    ],
    'plugins' => [
        'manage' => 'Hantera pluginerna',
        'enable_or_disable' => 'Aktivera eller inaktivera',
        'enable_or_disable_title' => 'Aktivera eller inaktivera pluginerna',
        'remove' => 'Ta bort',
        'refresh' => 'Uppdatera',
        'disabled_label' => 'Avaktivera',
        'disabled_help' => 'Pluginerna som är avaktiverade är igorerade av appliationen.',
        'selected_amount' => 'Markerade plugins: :amount',
        'remove_confirm' => 'Är du säker?',
        'remove_success' => 'Lyckades bort dessa plugins från systemet.',
        'refresh_confirm' => 'Är du säker?',
        'refresh_success' => 'Lyckades uppdatera dessa plugins från systemet.',
        'disable_confirm' => 'Är du säker?',
        'disable_success' => 'Lyckades avaktivera dessa plugins från systemet.',
        'enable_success' => 'Lyckades aktivera dessa plugins.',
        'unknown_plugin' => 'Pluginen har blivit borttagen från systemet.'
    ],
    'project' => [
        'name' => 'Projekt',
        'owner_label' => 'Ägare',
        'attach' => 'Länka projekt',
        'detach' => 'Avlänka projekt',
        'none' => 'Inget',
        'id' => [
            'label' => 'Projekt-ID',
            'help' => 'Hur du hittar ditt Projekt-ID',
            'missing' => 'Var god välj ett Projekt-ID',
        ],
        'detach_confirm' => 'Vill du verkligen avlänka detta projekt?',
        'unbind_success' => 'Projektet har blivit avlänkat',
    ],
    'settings' => [
        'menu_label' => 'Inställningar',
        'not_found' => 'Det går inte att hitta de angivna inställningarna.',
        'missing_model' => 'Inställningssidan saknar en modell-definition',
        'update_success' => 'Inställningar för :name har uppdaterats',
        'return' => 'Återgå till systeminställningar',
        'search' => 'Sök'
    ],
    'mail' => [
        'log_file' => 'Logfiler',
        'menu_label' => 'Epost-konfiguration',
        'menu_description' => 'Hantera epost-inställningar',
        'general' => 'Generellt',
        'method' => 'Email-metod',
        'sender_name' => 'Avsändarnamn',
        'sender_email' => 'Avsändarens epost-adress',
        'php_mail' => 'PHP mail',
        'sendmail' => 'Sendmail',
        'smtp' => 'SMTP',
        'smtp_address' => 'SMTP-adress',
        'smtp_authorization' => 'SMTP-autentisering krävs',
        'smtp_authorization_comment' => 'Om din server kräver autentisering, markerar du denna checkbox',
        'smtp_username' => 'Användarnamn',
        'smtp_password' => 'Lösenord',
        'smtp_port' => 'SMTP-port',
        'smtp_ssl' => 'SSL-anslutning krävs',
        'sendmail' => 'Sendmail',
        'sendmail_path' => 'Sendmail-sökväg',
        'sendmail_path_comment' => 'Var god ange sökvägen till sendmail',
        'mailgun' => 'Mailgun',
        'mailgun_domain' => 'Mailgun domän',
        'mailgun_domain_comment' => 'Vänligen ange Mailgun domännamnet.',
        'mailgun_secret' => 'Mailgun hemlighet',
        'mailgun_secret_comment' => 'Ange din Mailgun API nyckel.',
        'mandrill' => 'Mandrill',
        'mandrill_secret' => 'Mandrill hemlighet',
        'mandrill_secret_comment' => 'Ange din API nyckel.'
    ],
    'mail_templates' => [
        'menu_label' => 'Epost mall',
        'menu_description' => 'Ändra epost-mallar som skickas till användare och administratörer, hantera epost-utseende.',
        'new_template' => 'Ny mall',
        'new_layout' => 'Ny utseende',
        'template' => 'Mall',
        'templates' => 'Mallar',
        'menu_layouts_label' => 'Epost mallar',
        'layout' => 'Utseende',
        'layouts' => 'Utseenden',
        'name' => 'Namn',
        'name_comment' => 'Unikt namn för att hänvisa till den här mallen',
        'code' => 'Kod',
        'code_comment' => 'Unik kod som används för att hänvisa till den här mallen',
        'subject' => 'Ärende',
        'subject_comment' => 'Ärende till epost meddelandet',
        'description' => 'Beskrivning',
        'content_html' => 'HTML',
        'content_css' => 'CSS',
        'content_text' => 'Klartext',
        'test_send' => 'Skicka ett testmeddelande',
        'test_success' => 'Testmeddelandet har skickats.',
        'return' => 'Återvänd till mall-listan'
    ],
    'install' => [
        'project_label' => 'Länka till Projekt',
        'plugin_label' => 'Installera Plugin',
        'missing_plugin_name' => 'Välj ett plugin-namn att installera',
        'install_completing' => 'Installationen är klar',
        'install_success' => 'Pluginet har installerats',
    ],
    'updates' => [
        'title' => 'Hantera uppdateringar',
        'name' => 'Uppdatera mjukvara',
        'menu_label' => 'Uppdateringar',
        'menu_description' => 'Uppdatera systemet, hantera och installera plugins och teman.',
        'check_label' => 'Sök efter uppdateringar',
        'retry_label' => 'Försök igen',
        'plugin_name' => 'Namn',
        'plugin_description' => 'Beskrivning',
        'plugin_version' => 'Version',
        'plugin_author' => 'Skapare',
        'core_build' => 'Nuvarande build',
        'core_build_old' => 'Nuvarande build :build',
        'core_build_new' => 'Build :build',
        'core_build_new_help' => 'Senaste build är tillgänglig.',
        'core_downloading' => 'Laddar ner applikationsfiler',
        'core_extracting' => 'Packar upp applikationsfiler',
        'plugins' => 'Plugins',
        'disabled' => 'Avaktiverade',
        'plugin_downloading' => 'Laddar ner plugin: :name',
        'plugin_extracting' => 'Packar upp plugin: :name',
        'plugin_version_none' => 'Nytt plugin',
        'plugin_version_old' => 'Nuvarande v:version',
        'plugin_version_new' => 'v:version',
        'theme_label' => 'Tema',
        'theme_new_install' => 'Installation av nytt tema.',
        'theme_downloading' => 'Ladda ner temat: :name',
        'theme_extracting' => 'Packar upp temat: :name',
        'update_label' => 'Updatera mjukvara',
        'update_completing' => 'Slutför uppdatering',
        'update_loading' => 'Laddar tillgängliga uppdateringar...',
        'update_success' => 'Uppdateringen är slutförd.',
        'update_failed_label' => 'Updateringen misslyckades',
        'force_label' => 'Tvinga uppdatering',
        'found' => [
            'label' => 'Hittade nya uppdateringar!',
            'help' => 'Klicka på Updatera mjukvara för att påbörja processen.'
        ],
        'none' => [
            'label' => 'Inga uppdateringar',
            'help' => 'Inga nya uppdateringar hittades.'
        ]
    ],
    'server' => [
        'connect_error' => 'Ett fel uppstod vid anslutning till servern.',
        'response_not_found' => 'Uppdateringsserver kunde ej hittas.',
        'response_invalid' => 'Felaktigt svar från servern.',
        'response_empty' => 'Tomt svar från servern.',
        'file_error' => 'Servern kunde inte leverera paketet.',
        'file_corrupt' => 'Filen från servern är korrupt.',
    ],
    'behavior' => [
        'missing_property' => 'Klassen :class måste definera egenskapen $:property som används av :behavior -egenskapen',
    ],
    'config' => [
        'not_found' => 'Kunde inte hitta konfigurationsfilen :file definerad för :location',
        'required' => 'Konfigurationen som används i :location måste sända med ett värde :property',
    ],
    'zip' => [
        'extract_failed' => "Kunde inte packa upp core-fil ':file'.",
    ],
    'event_log' => [
        'hint' => 'Denna logg visar en lista över potentiella fel som uppstår i applikationen, såsom undantag och felsökningsinformation.',
        'menu_label' => 'Händelselog',
        'menu_description' => 'Visa systemloggmeddelanden med respektive tid och detaljer.',
        'empty_link' => 'Töm händelseloggen',
        'empty_loading' => 'Tömmer händelselogg...',
        'empty_success' => 'Lyckades tömma händelseloggen.',
        'return_link' => 'Återvänd till händelseloggen',
        'id' => 'ID',
        'id_label' => 'Händelse ID',
        'created_at' => 'Datum och tid',
        'message' => 'Meddelande',
        'level' => 'Nivå'
    ],
    'request_log' => [
        'hint' => 'Denna loggen visar en lista med förfrågningar från webbläsare som kan kräva uppmärksamhet. Till exempel, om en besökare öppnar en CMS sida som inte kan hittas så skapas en post med statuskoden 404.',
        'menu_label' => 'Förgrådan-logg',
        'menu_description' => 'Visa otillåtna eller omdirigerade förgrågningar, så som Sidan kunde inte hittas (404).',
        'empty_link' => 'Töm förfrågningan-loggen',
        'empty_loading' => 'Tömmer förfrågningan-loggen...',
        'empty_success' => 'Lyckades tömma förfrågningan-loggen.',
        'return_link' => 'Återvänd till förfrågningan-loggen',
        'id' => 'ID',
        'id_label' => 'Log ID',
        'count' => 'Räknare',
        'referer' => 'Refererare',
        'url' => 'URL',
        'status_code' => 'Status'
    ],
    'permissions' => [
        'name' => 'System',
        'manage_system_settings' => 'Hantera system inställningar',
        'manage_software_updates' => 'Hantera mjukvaruuppdateringar',
        'access_logs' => 'Visa system loggen',
        'manage_mail_templates' => 'Hantera epost-mallar',
        'manage_mail_settings' => 'Hantera epost inställningar',
        'manage_other_administrators' => 'Hantera andra administratörer',
        'view_the_dashboard' => 'Visa the kontrollpanelen',
        'manage_branding' => 'Anpassa back-end'
    ]
];
