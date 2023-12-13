<?php

namespace Master;

use Config\Query_builder;

class Mapel
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('mapel')->get()->resultArray();
        $res = ' <a href="?target=mapel&act=tambah_mapel" class="btn btn-info btn-sm">Tambah mapel</a>
    <br><br>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>kode_mp</th>
                    <th>nama_mp</th>
                    <th>kelas</th>
                    <th>guru_mp</th>
                    <th>Act</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                    <td width="10">' . $no . '</td>
                    <td width="100">' . $r['kode_mp'] . '</td>
                    <td>' . $r['nama_mp'] . '</td>
                    <td>' . $r['kelas'] . '</td>
                    <td>' . $r['guru_mp'] . '</td>
                    <td width="150">
                        <a href="?target=mapel&act=edit_mapel&id=' . $r['kode_mp'] . '" class="btn btn-success btn-sm">
                            Edit
                        </a>
                        <a href="?target=mapel&act=delete_mapel&id=' . $r['kode_mp'] . '" class="btn btn-danger btn-sm">
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
        $res = '<a href="?target=mapel" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=mapel&act=simpan_mapel" method="post">
                    <div class="mb-3">
                        <label for="kode_mp" class="form-label">kode_mp</label>
                        <input type="text" class="form-control" id="kode_mp" name="kode_mp">
                    </div>
                    <div class="mb-3">
                        <label for="nama_mp" class="form-label">nama_mp</label>
                        <input type="text" class="form-control" id="nama_mp" name="nama_mp">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas">
                    </div>
                    <div class="mb-3">
                        <label for="guru_mp" class="form-label">guru_mp</label>
                        <input type="text" class="form-control" id="guru_mp" name="guru_mp">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';
        return $res;
    }

    public function simpan()
    {
        $kode_mp = $_POST['kode_mp'];
        $nama_mp = $_POST['nama_mp'];
        $kelas = $_POST['kelas'];
        $guru_mp = $_POST['guru_mp'];

        $data = array(
            'kode_mp' => $kode_mp,
            'nama_mp' => $nama_mp,
            'kelas' => $kelas,
            'guru_mp' => $guru_mp,
        );
        return $this->db->table('mapel')->insert($data);
    }

    public function edit($id)
    {
        $r = $this->db->table('mapel')->where("kode_mp='$id'")->get()->rowArray();

        $res = '<a href="?target=mapel" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form action="?target=mapel&act=update_mapel" method="post">
                <input type="hidden" class="form-control" id="param" name="param" value="' . $r['kode_mp'] . '">
                    <div class="mb-3">
                        <label for="kode_mp" class="form-label">kode_mp</label>
                        <input type="text" class="form-control" id="kode_mp" name="kode_mp" value="' . $r['kode_mp'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="nama_mp" class="form-label">nama_mp</label>
                        <input type="text" class="form-control" id="nama_mp" name="nama_mp" value="' . $r['nama_mp'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="' . $r['kelas'] . '">
                    </div>
                    <div class="mb-3">
                        <label for="guru_mp" class="form-label">guru_mp</label>
                        <input type="text" class="form-control" id="guru_mp" name="guru_mp" value="' . $r['guru_mp'] . '">
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
        $kode_mp = $_POST['kode_mp'];
        $nama_mp = $_POST['nama_mp'];
        $kelas = $_POST['kelas'];
        $guru_mp = $_POST['guru_mp'];

        $data = array(
            'kode_mp' => $kode_mp,
            'nama_mp' => $nama_mp,
            'kelas' => $kelas,
            'guru_mp' => $guru_mp,
        );

        return $this->db->table('mapel')->where("kode_mp='$param'")->update($data);
    }

    public function delete($id)
    {

        return $this->db->table('mapel')->where("kode_mp='$id'")->delete();
    }
}
