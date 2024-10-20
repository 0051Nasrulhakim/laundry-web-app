<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
    // Mengubah format tanggal dari YYYY-MM-DD HH:MM:SS ke DD-MM-YYYY HH:MM:SS
    $hari = array(
        1 => 'Senin',
        2 => 'Selasa',
        3 => 'Rabu',
        4 => 'Kamis',
        5 => 'Jumat',
        6 => 'Sabtu',
        7 => 'Minggu'
    );

    $bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );

    // Menggunakan fungsi strtotime untuk memparse tanggal dan waktu
    $timestamp = strtotime($tanggal);
    if (!$timestamp) {
        return "Format tanggal tidak valid";
    }

    // Mendapatkan komponen tanggal dan waktu
    $tanggal_indo = date('d', $timestamp) . ' ' . $bulan[date('n', $timestamp)] . ' ' . date('Y', $timestamp);
    $jam = date('H:i:s', $timestamp); // Format jam, menit, dan detik

    if ($cetak_hari) {
        $num = date('N', $timestamp);
        return $hari[$num] . ', ' . $tanggal_indo . ' ' . $jam;
    }
    return $tanggal_indo . ' ' . $jam;
}
