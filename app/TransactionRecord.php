<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionRecord extends Model
{
    protected $table = 'calc_hist';

    private function calculateRawTotal()
    {
        $this->raw_total = $this->vzw_amt + $this->gas_amt + $this->water_amt + $this->electric_amt;
    }

    public function createTransactionRecord($data)
    {
        foreach($data as $key => $val)
        {
            $this->{$key} = (float)$val;
        }
        $this->calculateRawTotal();
        $this->save();
    }

    public function split()
    {
        setlocale(LC_MONETARY, 'en_US');
        return money_format('%i', $this->raw_total / $this->num_people);
    }
}
