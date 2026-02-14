<?php 
require_once ($_SERVER['DOCUMENT_ROOT'].'/customer/siteOps.php');
/*
	CLASS FOR CREATING USER SESSIONS AND HOLDING THEM IN THE MYSQL DATABASE FOR PERSISTENCE INSTEAD OF CRAMMING IT ALL INTO MEMCACHE

*/
class forum_sesh
{
	private $db;
	
	public function _construct()
	{
		$this->db = siteOps::getConfig();
		session_set_save_handler(
			array($this, "sess_open"),
			array($this, "sess_close"),
			array($this, "sess_read"),
			array($this, "sess_write"),
			array($this, "sess_destroy"),
			array($this, "sess_gc")
			);
			
		session_start();
	}
	
    public function sess_open() 
	{
        if($this->db)
		{
		// Return True
			return true;
		}
		// Return False
		return false;
    }

    public function sess_close() 
	{
		if($this->db->close())
		{
			// Return True
			return true;
		}
		return false;
    }

    public function sess_read($sess_id)
	{
		//$config = forum_logo::getConfig();
        $sql = "SELECT Data FROM sessions WHERE SessID = '?'";
		$this->db->bind('s',$sess_id);
        $result = $this->$db->prepare($sql);
		$result->execute();
		//$result->store_result();
		
		
		if (!$result->num_rows())
		{
			$result->close();
            $CurrentTime = time();
            $sql = "INSERT INTO sessions (SessID, DateTouched) VALUES ('?','?')";
			$this->db->bind('ss',$sess_id,$CurrentTime);
            $nextRes = $this->db->prepare($sql);
			$nextRes->execute();
			$nextRes->close();
			return '';
        } 
		else 
		{
			$row = $result->fetch_array(MYSQLI_BOTH);
            extract($row, EXTR_PREFIX_ALL, 'sess');
            $sql = "UPDATE sessions SET DateTouched='?' WHERE SessID='?'";
			$this->db->bind('ss',$sess_id,$CurrentTime);
			$nextRes = $this->db->prepare($sql);
			$nextRes->execute();
			$nextRes->close();
            return $this->db->single();
        }
    }

    public function sess_write($sess_id, $data)
	{
		$CurrentTime = time();
        $sql = "UPDATE sessions SET Data = '?', DateTouched = '?' WHERE SessID = '?'";
		$this->db->bind('sss',$data,$CurrentTime,$sess_id);
		$result = $this->db->prepare($sql);
		if($result->execute())
		{		
			$result->close();
			return true;
		}
		else
		{
			$result->close();
			return false;
		}
	}

    public function sess_destroy($sess_id)
	{
		$sql="DELETE FROM sessions WHERE SessID = '?'";
		$this->db->bind('s',$sess_id);
		$result = $this->db->prepare($sql);
		if($result->execute())
		{
			$result->close();
			return true;
		}
		else
		{
			$result->close();
			return false;
		}
	}

    public function sess_gc($sess_maxlifetime)
	{
		$config = siteOps::getConfig();
		$CurrentTime = time();
        $sql="DELETE FROM sessions WHERE DateTouched + '?' < '?'";
		$this->db->bind('ss',$sess_maxlifetime,$CurrentTime);
		$result = $this->db->prepare($sql);
		if($result->execute())
		{
			$result->close();
			return true;
		}
		else
		{
			$result->close();
			return false;
		}
	}

}
?>