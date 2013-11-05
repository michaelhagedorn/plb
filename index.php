<?php
// INDEX File für Projekt Leistungsbeschreibungen / PLB

// Dieses Projekt beinhaltet die Programmierung sowie Evaluierung einer 
// Design-Umgebung für IT Systemhäuser


// INDEX Definitions

    define ("APP_VERSION_DESC",     "development");
    define ("APP_VERSION_INT",      "0.0.2");
    define ("APP_LANG",             "german");

    define ("DEBUG_GLOBAL", TRUE);
    define ("SESSION_DELETE_SESSION_FILE", TRUE);
    
    date_default_timezone_set('Europe/Berlin'); //timezone

// INDEX Includes -> zur Laufzeit benötigter Quellcode
    // KLASSEN
        // Logbuch
        include 'classes/c_log.php';
        // Session Handler
        include 'classes/c_session.php';
        // MySQL-Anbindung
        include 'classes/ez_sql_core.php';
        include 'classes/ez_sql_mysql.php';



    // DEFINITIONEN
        // Sprachdefinitionen
        //  - Sprachdatei muss vorhanden sein, ansonsten bricht das gesamte 
        //  Programm ab!
        //  - aktuelle Standardsprache ist "german"
        //  - Erweiterung der Sprachen ist in der TODO näher beschrieben
        
        (@include("lang/" . APP_LANG . ".php")) 
            OR 
                die("Sprache konnte nicht ermittelt und "
                . "gesetzt werden. Bitte stellen Sie sicher, dass die "
                . "aktuelle Sprache durch zum Beispiel "
                . "\"define (\"APP_LANG\",\"german\");\" in der index.php "
                . "definiert ist. Eine Sprachdatei ist erforderlich! "
                . "Diese können Sie <a href=\"#\">hier</a> "
                . "herunterladen.");
        
    // Objekte
        // Da der Logger auch für die Klassen zuständig ist muss dieser als 
        // erstes instanziiert werden
        $log = new c_log;
        // DIe Session Klasse / das Objekt möchte die Session erstellen, dieses 
        // kann nur passieren, wenn noch kein einziges Zeichen als Antwort auf 
        // die Anfrage an den Browser gesendet wurde
        $session = new c_session; 
        // MySQL Datenbankobjekt
        //$db = new ezSQL_mysql('root', '', 'lb', 'localhost'); //user, password, database name, host
        
// INDEX Header --> HTML-HEAD       

    // Vorerst zur korrekten Darstellung von Umlauten
        // Dieses sollte in eine separate HTML-Header-Datei ausgelagert werden
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="de">
    <head>
        <title>Vorlage für XHTML 1.0 Strict </title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="Content-Style-Type" content="text/css" />
        <meta name="robots" content="index, nofollow">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<?php        
        // Die CSS-Style Datei muss noch dynamisch gestaltet und dementsprechen 
        // eingebunden werden. Vorerst wird ein Default-Style angelegt
?>
        <style type="text/css">
        <!--
         @import url("styles/default.css");
        -->
        </style>
    </head>
    <body>        
<?php


// INDEX Debug -> Debugging HEAD

    if (DEBUG_GLOBAL)
    {
        echo    DEBUG_GLOBAL ? "        DEBUG_BEGIN : [" . L_N_APP_STATUS . ": "
                . APP_VERSION_DESC . " ". L_P_IN . " " . L_N_SUBVERSION ." " 
                . APP_VERSION_INT . "]<br>" : FALSE;

            // DEBUG Netto Beginn
        
                $log->quickAddLog("Test-Logbucheintrag");
                $log->quickAddLog("Ein etwas längerer Eintrag um die Ausrichtung zu testen...");

                
                
                $session->set_var("username", "Michael Hagedorn");
                $session->logout();
                // Datenbank muss vorhanden sein : sonst gibt es Fehler
                //$db->query("SHOW TABLES");
                //$db->debug();

                $aLogs = $log->getLogsAsArray();
                include("tmpl/tmpl_log_show.php");
            
            // DEBUG Netto Ende
        
        echo DEBUG_GLOBAL ? "       DEBUG_END\n" : FALSE;    
    }

// INDEX Produktiver Anteil 

?>
    </body>
</html>