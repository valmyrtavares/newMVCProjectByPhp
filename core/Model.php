namespace core;

use \core\Database;
use \ClanCats\Hydrahon\Builder;
use \ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class Model {

    protected $_h;
    
    public function __construct() {
        $this->_checkH();
    }

    public function _checkH() {
        if($this->_h == null) {
            $connection = Database::getInstance();
            $this->_h = new Builder('mysql', function($query, $queryString, $queryParameters) use($connection) {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);

                if ($query instanceof FetchableInterface)
                {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                }
            });
        }
        
        $this->_h = $this->_h->table( $this->getTableName() );
    }

    public  function getTableName() {
        return $this->table;
    }

    public  function select($fields = []) {
        $this->_checkH();
        return $this->_h->select($fields);
    }

    public  function insert($fields = []) {
        $this->_checkH();
        return $this->_h->insert($fields);
    }

    public  function update($fields = []) {
        $this->_checkH();
        return $this->_h->update($fields);
    }

    public  function delete() {
        $this->_checkH();
        return $this->_h->delete();
    }

}