<?php

namespace Master;

use Config\Query_builder;

class guru
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('guru')->get()->resultArray();
        $res = ' <a href="?target=guru&act=tambah_guru" class="btn btn-info btn-sm">Tambah guru</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>nip</th>
                    <th>nama</th>
                    <th>Ttl</th>
                    <th>Alamat</th>
                    <th>Jk</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['nip'] . '</td>
                    <td>' . $r['nama'] . '</td>
                    <td>' . $r['Ttl'] . '</td>
                    <td>' . $r['Alamat'] . '</td>
                    <td width="100">' . $r['Jk'] . '</td>
                    <td width="150">
                        <a href="?target=guru&act=edit_guru&id=' . $r['nip'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=guru&act=delete_guru&id=' . $r['nip'] . '" class="btn btn-danger btn-sm">
                            Hapus
                        </a>
                    </td>
                </tr>';
            $no++;
        }
        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=guru" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=guru&act=simpan_guru" method="post">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="Ttl" class="form-label">Ttl</label>
                        <input type="text" class="form-control" id="Ttl" name="Ttl">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="Jk" class="form-label">Jk</label>
                        <br>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="Jk" id="Jk1" value="1">
                            <label for="Jk1" class="form-check-label">
                                L
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="Jk" id="Jk0" value="0">
                            <label for="Jk0" class="form-check-label">
                                P
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $Ttl = $_POST['Ttl'];
        $Alamat = $_POST['Alamat'];
        $Jk = $_POST['Jk'];

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'Ttl' => $Ttl,
            'Alamat' => $Alamat,
            'Jk' => $Jk
        );
        return $this->db->table('guru')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('guru')->where("nip='$id'")->get()->rowArray();

        $res = '<a href="?target=guru" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=guru&act=update_guru" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['nip'] . '">
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="' . $r['nip'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="' . $r['nama'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="Ttl" class="form-label">Ttl</label>
                        <input type="text" class="form-control" id="Ttl" name="Ttl" value="' . $r['Ttl'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="Alamat" name="Alamat" value="' . $r['Alamat'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="Jk" class="form-label">Jk</label>
                        <br>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="Jk" id="Jk1" value="1" ' . $this->cekRadio($r['Jk'], 1) . '>
                            <label for="Jk1" class="form-check-label">
                                L
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" class="form-check-input" name="Jk" id="Jk0" value="0" ' . $this->cekRadio($r['Jk'], 0) . '>
                            <label for="Jk0" class="form-check-label">
                                P
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>';
        return $res;
    }

    public function cekRadio($val1, $val2)
    {
        if ($val1 == $val2) {
            return "checked";
        }
        return "";
    }

    public function update()
    {
        $param = $_POST['param'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $Ttl = $_POST['Ttl'];
        $Alamat = $_POST['Alamat'];
        $Jk = $_POST['Jk'];

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'Ttl' => $Ttl,
            'Alamat' => $Alamat,
            'Jk' => $Jk
        );

        return $this->db->table('guru')->where("nip='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('guru')->where("nip='$id'")->delete();
    }
}

