<?php


class c_log 
{

    private $strMessage;
    private $intTimestamp = 0;
    private $intPriority;
    private $intFacility;
    
    private $aPriorities    =   array   (
                                            0 => "Emergency",
                                            1 => "Alert",
                                            2 => "Critical",
                                            3 => "Error",
                                            4 => "Warning",
                                            5 => "Notice",
                                            6 => "Informational",
                                            7 => "Debug"
                                        );
    
    private $aFacilities    =   array   (
                                            0 => "Security",
                                            1 => "Classes",
                                            2 => "User",
                                            3 => "System"
                                        );
    private $aLogs          =   array   ();
    
    
    function __construct() {
        $this->setTimestamp();
        $this->setPriority("Informational");
        $this->setFacility("User");
        $this->setMessage("Logger started...");
        
        $this->addLog();
    }
    
    private function addLog()
    {
        $this->aLogs[]      =   array    (
                                                "facility"  => $this->intFacility,
                                                "priority"  => $this->intPriority,
                                                "time"      => $this->intTimestamp,
                                                "user"      => 0,
                                                "message"   => $this->strMessage
                                            );
    }
    
    public function quickAddLog($Message, $Facility="System", $Priority="Informational")
    {
        // Diese Funktion vereinfach die Erstellung eines Logbucheintrags
        $this->setTimestamp();
        $this->setPriority($Priority);
        $this->setFacility($Facility);
        $this->setMessage($Message);
        
        $this->addLog();
    }
    
    
    public function getLogEntry($ID)
    {
        // Einen speziellen Logbucheintrag ausgeben
        echo "<pre>";
        var_dump($this->aLogs[$ID]);
        echo "</pre>";        
    }
    
    public function dumpLogs()
    {
        // Alle Logbucheinträge ausgeben
        echo "<pre>";
        var_dump($this->aLogs);
        echo "</pre>";        
    }
    
    public function getLogsAsArray()
    {
        // Alle Logbucheinträge als Array zurückgeben
        
        return $this->aLogs;
    }


    private function setMessage($Message)
    {
        // dem Objekt die Message übergeben
        $this->strMessage = $Message;
    }
    
    private function setTimestamp()
    {
        // dem Objekt den aktuellen Zeitstempel zufügen 
        $this->intTimestamp = time();
    }
    
    private function setPriority($Priority)
    {
        // Wenn die Priorität in $this->aPriorities definiert ist kann 
        // diese auch gesetzt werden
        if ( in_array ($Priority, $this->aPriorities) )
        {
                $this->intPriority = $Priority;
        }
    }
    
    private function setFacility($Facility)
    {
        // Wenn die Facility in $this->aFacilities definiert ist kann 
        // diese auch gesetzt werden
        if ( in_array ($Facility, $this->aFacilities) )
        {
                $this->intFacility = $Facility;
        }  
    }
}

?>
