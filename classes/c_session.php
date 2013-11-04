<?php

class c_session {
	
	var $strSessionID;
	var $boolLogout;

	
	function __construct() 
	{		
			//echo "CONSTRUCT: Session start - SESSIONID: ".session_id()."<br>";
			$this->start();
			//echo "CONSTRUCT:  Session wurde gestartet - SESSIONID: ".session_id()."<br>";
			
			if (isset($_GET['logout']))
			{
				if($_GET['logout'])
				{
					//echo "<br><br>LOGOUT ist TRUE<br> DESTROY Session with ID: ".$session->strSessionID."-- ".session_id()."<br>";
					$this->logout();
					//echo "New Session with ID: ".$session->strSessionID."-- ".session_id()."<br>";
					return true;
				}
				return false;
			}		
			return false;
	}
	
	function start()
	{		
		session_start();
		$this->strSessionID = session_id();
                global $log;
                $log->quickAddLog( L_N_SESSION . L_M_CONCLUSION . L_S_SESSION_START_RESUME . ": " . $this->strSessionID, "Session", "Notice");
		return true;
	}
	
	function generate_new_sessionid()
	{
		// neue SessionID wird nur generiert wenn das Löschen der 
                // Sessionfile gewünscht ist ($this->boolDeleteSessionFile = true)
		if(SESSION_DELETE_SESSION_FILE)
		{
			session_regenerate_id (SESSION_DELETE_SESSION_FILE);
			$this->strSessionID = session_id();
                        global $log; $log->quickAddLog( L_N_SESSION . L_M_CONCLUSION . L_S_SESSION_NEW_SID_GENERATED . ":". session_id(), "Session", "Informational");
		}
	}
	
	function logout()
	{
                global $log;
                $log->quickAddLog( L_N_SESSION . L_M_CONCLUSION . L_S_SESSION_LOGOUT_INITIATED, "Session", "Notice");
		$this->destroy();
		$this->start();
		$this->generate_new_sessionid();
                $log->quickAddLog( L_N_SESSION . L_M_CONCLUSION . L_S_SESSION_NEW_SID. ": " . session_id(), "Session", "Notice");
	}
	
	function destroy()
	{		
		session_unset();
		session_destroy();
                global $log; $log->quickAddLog( L_N_SESSION . L_M_CONCLUSION . L_S_SESSION_DESTROY, "Session", "Notice");
	}
	
	function session_exist()
	{
		if(session_id())
		{
			// Wenn session_id eine ID zurückliefert wird wahr 
                        // geliefert
			return true;
		}
		return false;			
	}
	
	function validate()
	{    
            // Die Session validieren - Sollte die im Objekt gesetzte 
            // Session-ID abweichend von der durch session_id() 
            // zurückgelieferte sein, wird FALSE zuzrückgeliefert
            if ($this->strSessionID === session_id())
            {
                    return true;
            }
            return false;
	}
	
	function set_var($varname,$value)
	{
		if (!$varname)
		{
			echo "ungültiger set_var-Aufruf (session) --> \$varname = \"$varname\" ist leer";
			return false;
		}
		else 
		{
			$_SESSION[$varname] = $value;
			
			if($_SESSION[$varname] === $value)
			{
				return true;
			}	
		}		
		return false;
	}
	
	function print_session_id()
	{
		// Die aktuelle Session-ID ausgeben
		echo $this->strSessionID;
	}
	
	function validate_var($var)
	{
		// Prüfen ob eine Variable gesetzt ist und bei Erfolg 
                // zurückgeben
		// Sollte diese nicht gestzt sein, wird NULL zurückgeliefert
		return isset($_SESSION[$var]);
	}
	
	function print_var( $varname)
	{
		// Eine bestimmte Variable aus der Session zurückgeben
		echo isset($_SESSION[$varname]) ? $_SESSION[$varname] : FALSE;
	}
	
	function get_var($varname)
	{
		// Eine bestimmte Variable aus der Session auslesen
		return isset($_SESSION[$varname]) ? $_SESSION[$varname] : FALSE;
	}
	
	function unset_var($varname)
	{
		// Eine bestimmte Variable in der Session löschen
		unset($_SESSION[$varname]);
	}
}

?>
