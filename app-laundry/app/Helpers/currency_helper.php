<?php
function formatRupiah($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
