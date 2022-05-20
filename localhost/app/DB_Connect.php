<?
namespace app;

class DB_Connect
{
    private $db;
    public function __construct() {
        $this->db = new \app\DB_Manipulations();
    }

   public function DB_Connect()
    {
        try {
            $dbh = new \PDO('mysql:host=localhost;dbname=test', 'root', '');
        } catch
        (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }

       return $this->db->DB_Manipulations($dbh);
    }
}

class DB_Manipulations
{
    public function DB_Manipulations($dbh)
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }else {
            $page = 1;
        }
        $kol = 5;  //количество записей для вывода
        $art = ($page * $kol) - $kol;

        if(isset($_GET['id']))
        {
            $sql = "SELECT * FROM news WHERE id =".$_GET['id'];
        } else {
            $sql = "SELECT * FROM news ORDER BY idate DESC LIMIT $art, $kol";
        }

        $stmt = $dbh->query($sql);
        $arResult = [];
        while ($row = $stmt->fetch()) {
            $row['idate'] = gmdate("d.m.Y", $row['idate']);
            $arResult[$row['id']] = $row;
        }

        $res = $dbh->query("SELECT COUNT(*) FROM news");
        $row = $res->fetch();
        $arResult['NUM_PAGE'] = ceil($row[0] / $kol);

        return $arResult;
    }
}