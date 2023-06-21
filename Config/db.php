<?
class Db
{
  private $connect;
  private static $db;

  /** */
  /*********** Constructor **************** */
  private function __construct($options = null)
  {
    if ($options != null) {
      $host = $options['host'];
      $user = $options['user'];
      $pass = $options['pass'];
      $dbname = $options['dbname'];
    } else {
      global $config;
      $host = $config['db']['host'];
      $user =  $config['db']['user'];
      $pass = $config['db']['pass'];
      $dbname =  $config['db']['dbname'];
    }
    $this->connect = new mysqli($host, $user, $pass, $dbname);
    // Check connection
    if ($this->connect->connect_error) {
      echo "Connection failed: " . $this->connect->connect_error;
      exit;
    }
    $this->connect->query("SET NAMES 'utf8'");
  }
  /*********** Get Instance **************** */
  public static function getInstance($option = false)
  {
    if (self::$db == null)
      self::$db = new Db($option);
    return self::$db;
  }
  /*********** First Record **************** */
  public function first($sql, $return = true)
  {
    $result = $this->doquery($sql);
    if ($result == null) {
      return null;
    }
    if ($return)
      return $result[0];
    else
      dump($result[0]);
  }


  /*********** Run Query **************** */
  public function doquery($sql)
  {
    $result = $this->connect->query($sql);
    $records = array();
    if ($result->num_rows == 0) {
      return null;
    }
    while ($row = $result->fetch_assoc()) {
      $records[] = $row;
    }
    return $records;
  }



  /*********** connection open **************** */
  public function connection()
  {
    return $this->connect;
  }



  /*********** connection close **************** */
  public function close()
  {
    $this->connect->close();
  }



  /*********** Run Query **************** */
}
