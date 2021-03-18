<?php
class DataManager
{
    private $file_name = 'example_db.json'; //к переменной с доступом
    // private мы можем обращаться только внутри класса
    private $db = [];
// pubic, private, protected - это модификатор доступа.Используется 
// для задания области видимости переменных
    public function __construct() {
        if (file_exists($this->file_name)) {
            $json_db = file_get_contents($this->file_name);
            $db = json_decode($json_db, true);
            if (is_array($db)) {
                $this->db = $db;
            }
        }
    }

    protected function save() {
        $content = json_encode($this->db, JSON_PRETTY_PRINT);
        file_put_contents($this->file_name, $content);
    }

    public function add($value) {
        $this->db[] = $value;
        $this->save();
    }
    public function delete($id) {
        if( 
        array_key_exists($id, $this->db)){
        unset($this->db[$id]);
        $this->save();
    }
}
    public function update($id,$new_value) {
        $this->db[$id] = $new_value; 
        $this->save();
    }

    public function getAll() {
        return $this->db;
    }
}
