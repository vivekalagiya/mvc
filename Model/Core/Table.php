<?php 
namespace Model\Core;

class Table extends \Model\Core\Table\Collection {

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    protected $tableName = Null;
    protected $primaryKey = Null;
    protected $adapter = Null;
    protected $data = [];
    protected $originalData = [];

    public function setTableName($tableName = Null)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function setPrimaryKey($primaryKey = Null)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function setOriginalData(array $originalData)
    {
        $this->originalData = array_merge($this->originalData, $originalData);
        return $this;
    }

    public function getOriginalData($key = Null)
    {
        if(!$key){
            return $this->originalData;
        }
        if(!array_key_exists($key, $this->originalData)) {
            return null;
        }
        return $this->originalData[$key];
        
    }

    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    public function getData($key = Null)
    {
        if(!$key){
            return $this->data;
        }
        if(!array_key_exists($key, $this->data)) {
            return null;
        }
        return $this->data[$key];
        
    }

    public function unsetData()
    {
        $this->data = [];
        return $this;
    }

    public function addData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function removeData($key)
    {
        if(array_key_exists($key, $this->data)) {
            unset($this->data[$key]);
        }
        return $this;
    }

    public function resetData()
    {
        $this->data = [];
    }

    public function __set($key = Null, $data)
    {
        $this->data[$key] = $data;
        return $this;
    }
    
    public function __get($key = Null)
    {
        if(array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        if(array_key_exists($key, $this->originalData)) {
            return $this->originalData[$key];
        }                                  
            
        return null;
    }

    public function setAdapter($adapter = Null)
    {
        if(!$adapter) {
            $adapter = new \Model\Core\Adapter();
        }
        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter()
    {
        if(!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enabled',
            self::STATUS_DISABLED => 'Disabled'
        ];
    }

    public function load($id, $columnName = Null)
    {
        if(!$columnName) {
            $columnName = $this->getPrimaryKey();
        }
        if(!$id) {
            return $this;
        }
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$columnName}` = '{$id}' ";
        $row = $this->getAdapter()->fetchRow($query);
        if(!$row) {
            return false;
        }
        $this->setOriginalData($row); 
        $this->resetData(); 
        return $this;
    }

    public function fetchRow($query)
    {
        $row = $this->getAdapter()->fetchRow($query);     
        if(!$row) {
            return null;
        }
        $this->setOriginalData($row);
        return $this;
        
    }

    public function fetchAll($query = Null)
    {
        if(!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query); 
        if(!$rows) {
            return null;
        }    
        foreach ($rows as $key => &$row) {
            $rowObject = new $this;
            $row = $rowObject->setOriginalData($row);
        }

        $collectionClassName = get_class($this).'\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($rows);
        return $collection;
    }

    public function save($query = Null) {
        if(array_key_exists($this->getPrimaryKey(), $this->data)) {
            unset($this->data[$this->getPrimaryKey()]);
        }
        if(!$this->data) {
            return false;
        }

        $id = (int) $this->getOriginalData($this->getPrimaryKey());
        
        if(!$id){
            return $this->insert($query);
        }
        return $this->update($query);
    }
    
    public function insert($query) {
        if(!$query) {
            foreach ($this->data as $key => $value) {
                $keys[] = '`'.$key.'`';
                $values[] = '\''.$value.'\'';
            }
            $keys = implode(', ', $keys);
            $values = implode(', ', $values);
            
            $query = "INSERT INTO `{$this->getTableName()}` ($keys)
            VALUES ($values)";
        }
        $id = $this->getAdapter()->insert($query);
        $this->load($id);
        if($id) {
            $model = \Mage::getModel('Model\Admin\Message');
            $model->setSuccess('Record Add Successfully.');
        }
        return $id;
    }
    
    public function update($query) {
        $id = $this->getOriginalData($this->getPrimaryKey());
        if(!$query) {
            foreach ($this->data as $key => $value) {
                $key = str_replace("'", "`", $key);
                $set[] = " `$key` = '$value'";
            }
            $set = implode(', ', $set);
            
            $query = "UPDATE
            `{$this->getTableName()}` 
            SET
            $set
            WHERE
            `{$this->getTableName()}`.`{$this->getPrimaryKey()}` = '{$id}' ";
        }
        $result = $this->getAdapter()->update($query);
        $this->load($id);
        if($result) {
            $model = \Mage::getModel('Model\Admin\Message');
            $model->setSuccess('Record Update Successfully.');
        }
        return $result;
    }

    public function delete($id)
    {
        $id = (int)$id;
        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getTableName()}`.`{$this->getPrimaryKey()}` = {$id}";
        $adapter = new \Model\Core\Adapter();
        $result = $adapter->delete($query);
        if($result) {
            $model = \Mage::getModel('Model\Admin\Message');
            $model->setSuccess('Record Delete Successfully.');
        }
        return $result;
    }
                
    




}