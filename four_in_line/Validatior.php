<?php
class Validator
{
    private $count = 0;
    public function checkWinner($table, $r, $c, $y_axis = 0, $x_axis = 0) {
        $value = getEntry($table, $r, $c);

    
        for ($i = 1; $i <= 3; $i++) {
            $r = $r + $y_axis;
            $c = $c + $x_axis;
            if (getEntry($table, $r, $c) == $value) {
                $this->count++; 
            }
            else {
                break;
            }
        }
        if ($this->count >= 3) {
            throw new Exception($value);
        }
    
    }
    public function resetCounter () {
     $this->count = 0;   
    }
}
