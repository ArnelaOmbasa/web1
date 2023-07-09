<?php
require_once __DIR__ . "/../dao/MidtermDao.php";

class MidtermService
{
    protected $dao;

    public function __construct()
    {
        $this->dao = new MidtermDao();
    }

    public function get_investors()
    {
        return $this->dao->get_investors();
    }

    public function get_investor_by_id($id)
    {
        return $this->dao->get_investor_by_id($id);
    }

    public function add_transfer($data)
    {
        return $this->dao->add_transfer($data);
    }

    public function get_transfers()
    {
        return $this->dao->get_transfers();
    }
}
