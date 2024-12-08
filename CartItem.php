<?php

class CartItem
{
    public $pid;
    public $bid;
    public $qty;

    public function __construct($pid, $bid, $qty)
    {
        $this->pid = $pid;
        $this->bid = $bid;
        $this->qty = $qty;
    }
}
?>