<?php
// INDEX File für Projekt Leistungsbeschreibungen / PLB

// Dieses Projekt beinhaltet die Programmierung sowie Evaluierung einer Design-Umgebung für IT Systemhäuser


// INDEX Definitions

define ("APP_VERSION_DESC",     "development");
define ("APP_VERSION_INT",      "0.0.1");

define ("DEBUG_GLOBAL", TRUE);
// INDEX Includes -> zur Laufzeit benötigter Quellcode
// KLASSEN

// DEFINITIONEN


// INDEX Debug -> Debugging HEAD

if (DEBUG_GLOBAL)
{
    echo DEBUG_GLOBAL ? "DEBUG_BEGIN : [Applikationsstatus: " . APP_VERSION_DESC . " in Subversion " . APP_VERSION_INT . "]<br>" : FALSE;


    echo DEBUG_GLOBAL ? "<br>DEBUG_END" : FALSE;    
}

// INDEX Produktiver Anteil 


?>