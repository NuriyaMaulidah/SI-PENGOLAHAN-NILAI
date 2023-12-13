<?php

use Master\Menu;
use Master\Siswa;
use Master\Guru;
use Master\Mapel;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$siswa = new Siswa($dataKoneksi);
$guru = new Guru($dataKoneksi);
$mapel = new mapel($dataKoneksi);
//$siswa ->tambah();
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">PENGOLAHAN NILAI RAPORT</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content siswa====
            } elseif ($target == "siswa") {
                if ($act == "tambah_siswa") {
                    echo $siswa->tambah();
                } elseif ($act == "simpan_siswa") {
                    if ($siswa->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=siswa'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=siswa'
                        </script>";
                    }
                } elseif ($act == "edit_siswa") {
                    $id = $_GET['id'];
                    echo $siswa->edit($id);
                } elseif ($act == "update_siswa") {
                    if ($siswa->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=siswa'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=siswa'
                        </script>";
                    }
                } elseif ($act == "delete_siswa") {
                    $id = $_GET['id'];
                    if ($siswa->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=siswa'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=siswa'
                        </script>";
                    }
                } else {
                    echo $siswa->index();
                }
                //====And Content Siswa====

                //====start content guru====
            } elseif ($target == "guru") {
                if ($act == "tambah_guru") {
                    echo $guru->tambah();
                } elseif ($act == "simpan_guru") {
                    if ($guru->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=guru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=guru'
                        </script>";
                    }
                } elseif ($act == "edit_guru") {
                    $id = $_GET['id'];
                    echo $guru->edit($id);
                } elseif ($act == "update_guru") {
                    if ($guru->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=guru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=guru'
                        </script>";
                    }
                } elseif ($act == "delete_guru") {
                    $id = $_GET['id'];
                    if ($guru->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=guru'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=guru'
                        </script>";
                    }
                } else {
                    echo $guru->index();
                }
                //====And Content Guru====

                //====start content mapel====
            } elseif ($target == "mapel") {
                if ($act == "tambah_mapel") {
                    echo $mapel->tambah();
                } elseif ($act == "simpan_mapel") {
                    if ($mapel->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=mapel'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=mapel'
                        </script>";
                    }
                } elseif ($act == "edit_mapel") {
                    $id = $_GET['id'];
                    echo $mapel->edit($id);
                } elseif ($act == "update_mapel") {
                    if ($mapel->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=mapel'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=mapel'
                        </script>";
                    }
                } elseif ($act == "delete_mapel") {
                    $id = $_GET['id'];
                    if ($mapel->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=mapel'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=mapel'
                        </script>";
                    }
                } else {
                    echo $mapel->index();
                }
                //====And Content ====
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>
</html>