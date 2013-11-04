<?php
// INDEX File für Projekt Leistungsbeschreibungen / PLB

// Dieses Projekt beinhaltet die Programmierung sowie Evaluierung einer 
// Design-Umgebung für IT Systemhäuser


// INDEX Definitions

    define ("APP_VERSION_DESC",     "development");
    define ("APP_VERSION_INT",      "0.0.2");
    define ("APP_LANG",             "english");

    define ("DEBUG_GLOBAL", TRUE);


// INDEX Header --> HTML-HEAD

    // Vorerst zur korrekten Darstellung von Umlauten
        echo "<meta http-equiv=\"content-type\" content=\"text/html; "
        . "charset=utf-8\" />";
        ?>
            <style type="text/css">
            <!--
            @import url("styles/default.css");
            -->
            </style>
        <?php
// INDEX Includes -> zur Laufzeit benötigter Quellcode
    // KLASSEN
        //Logbuch
        include 'classes/c_log.php';
    
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

// INDEX Debug -> Debugging HEAD

    if (DEBUG_GLOBAL)
    {
        echo    DEBUG_GLOBAL ? "DEBUG_BEGIN : [" . L_N_APP_STATUS . ": "
                . APP_VERSION_DESC . " ". L_P_IN . " " . L_N_SUBVERSION ." " 
                . APP_VERSION_INT . "]<br>" : FALSE;


        echo DEBUG_GLOBAL ? "<br>DEBUG_END" : FALSE;    
    }

// INDEX Produktiver Anteil 

// Aktueller Logbuchtest
$log = new c_log();
$log->quickAddLog("Test-Logbucheintrag");
$log->quickAddLog("Ein etwas längerer Eintrag um die Ausrichtung zu testen...");

$aLogs = $log->getLogsAsArray();
include("tmpl/tmpl_log_show.php");
?>