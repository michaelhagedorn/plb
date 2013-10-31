<?php
// INDEX File für Projekt Leistungsbeschreibungen / PLB

// Dieses Projekt beinhaltet die Programmierung sowie Evaluierung einer Design-Umgebung für IT Systemhäuser


// INDEX Definitions

define ("APP_VERSION_DESC",     "development_status");
define ("APP_VERSION_INT",      "0.0.1");

define ("DEBUG_GLOBAL", TRUE);
// INDEX Includes -> zur Laufzeit benötigter Quellcode
// KLASSEN

// DEFINITIONEN


// INDEX Debug -> Debugging HEAD

if (DEBUG_GLOBAL)
{
    echo DEBUG_GLOBAL ? "DEBUG_BEGIN" : FALSE;


    echo DEBUG_GLOBAL ? "DEBUG_END" : FALSE;    
}

// INDEX Produktiver Anteil 


?>