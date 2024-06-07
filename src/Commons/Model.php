<?Php
namespace Hp\XuongOop\Commons;


use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;

//bắt buộc phải có contruct va destruct
class Model{
    // protected  $conn;
    // protected $queryBuilder;
    protected Connection|null $conn;
    protected QueryBuilder $queryBuilder;
    protected string $tableName;
    
    public function __construct()
    {
      
       //thuc hien tu dong ket noi khi khoi tao bat ki class nao lien quan den model  

       $connectionParams = [
        'dbname' => $_ENV['DB_NAME'],
        'user' =>$_ENV['DB_USERNAME'] ,
        'password' => $_ENV['DB_PASSWORD'],
        'host' => $_ENV['DB_HOST'],
        'driver' => $_ENV['DB_DRIVER'],
    ];
    // $this->conn = DriverManager::getConnection($connectionParams);
    // $this->queryBuilder = $this->conn->createQueryBuilder();

    $this->conn = DriverManager::getConnection($connectionParams);

    $this->queryBuilder = $this->conn->createQueryBuilder();
    }

    //CRUD 

    // protected function all(){
    //         //  return $this->queryBuilder->select('*')->fetchAllAssociative();
    //         return $this->queryBuilder->select('*')->fetchAllAssociative();
    // }
    public function all()
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->orderBy('id','desc')      
        ->fetchAllAssociative();
    }

    // protected function paginate($page,$perPage = 10){

    // }
    public function paginate($page = 1, $perPage = 5)
    {
        $offset = $perPage * ($page - 1);

        $data =  $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('id','desc')
            ->fetchAllAssociative();
            $totalPage = ceil($this->count() / $perPage);

            return [$data,$totalPage];

    }

    // protected function findBYID($id){

    // }
    public function findByID($id)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
    
    public function insert(array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);

            $index = 0;
            foreach($data as $key => $value) {
                $query->setValue($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->executeQuery();

            return true;
        }

        return false;
    }

    // protected function update(){

    // }
    public function update($id, array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->update($this->tableName);

            $index = 0;
            foreach($data as $key => $value) {
                $query->set($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->where('id = ?')
                ->setParameter(count($data), $id)
                ->executeQuery();

            return true;
        }

        return false;
    }

    // protected function delete(){

    // }
    public function delete($id)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $id)
            ->executeQuery();
    }
    public function count(){
        return $this->queryBuilder->select("COUNT(*) as $this->tableName")->from($this->tableName)
        ->fetchOne();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>