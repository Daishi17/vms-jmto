<?php
// fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// membuat nama file ekspor "export-to-excel.xls"
header("Content-Disposition: attachment; filename=format_excel_neraca.xls");
?>
<style>
    #cetak_table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }

    #cetak_table td,
    #cetak_table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #cetak_table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #cetak_table tr:hover {
        background-color: #ddd;
    }

    #cetak_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>

<table id="cetak_table" class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>Uraian</th>
            <!-- <th>Jenis Laporan</th> -->
            <th>Tahun 2022 (Rp.)</th>
            <th>Tahun 2023 (Rp.)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Penjelasan/Opini dari Auditor Kantor Akuntan Publik</td>
            <!-- <td><?= $jenis_laporan_1 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_1 ?></td>
            <td><?= $nilai_tahun_kolom_2_1 ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jumlah Kas dan Bank</td>
            <!-- <td><?= $jenis_laporan_2 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_2 ?></td>
            <td><?= $nilai_tahun_kolom_2_2 ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Total Hutang</td>
            <!-- 3 -->
            <!-- <td><?= $jenis_laporan_3 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_3 ?></td>
            <td><?= $nilai_tahun_kolom_2_3 ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Total Ekuitas</td>
            <!-- 4 -->
            <!-- <td><?= $jenis_laporan_4 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_4 ?></td>
            <td><?= $nilai_tahun_kolom_2_4 ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Total Aktiva Lancar</td>
            <!-- 5 -->
            <!-- <td><?= $jenis_laporan_5 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_5 ?></td>
            <td><?= $nilai_tahun_kolom_2_5 ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Total Hutang Lancar</td>
            <!-- 6 -->
            <!-- <td><?= $jenis_laporan_6 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_6 ?></td>
            <td><?= $nilai_tahun_kolom_2_6 ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Laba Usaha</td>
            <!-- 7 -->
            <!-- <td><?= $jenis_laporan_7 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_7 ?></td>
            <td><?= $nilai_tahun_kolom_2_7 ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>EBITDA (Laba Usaha + Beban Penyusutan)</td>
            <!-- 8 -->
            <!-- <td><?= $jenis_laporan_8 ?></td> -->
            <td><?= $nilai_tahun_kolom_1_8 ?></td>
            <td><?= $nilai_tahun_kolom_2_8 ?></td>
        </tr>
    </tbody>
</table>