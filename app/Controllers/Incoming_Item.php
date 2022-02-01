<?php

namespace App\Controllers;

use App\Models\TempBarangMasukModel;

class Incoming_Item extends BaseController
{
    public function index()
    {
        return view('admin/incoming_item/index');
    }

    function dataTemp()
    {
        if ($this->request->isAJAX()) {
            $faktur = $this->request->getPost('faktur');

            $modelTemp = new TempBarangMasukModel();
            $data = [
                'datatemp' => $modelTemp->tampilDataTemp($faktur)
            ];
            $json = [
                'data' => view('admin/incoming_item/datatemp', $data)
            ];
            echo json_encode($json);
        } else {
            exit('Maaf tidak bisa dipanggil');
        }
    }
}
