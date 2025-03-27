<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['server_key'] = 'SB-Mid-server-M4K9XzP9uwdjgNgBCjXIrRTN'; // Server key Midtrans Anda
$config['client_key'] = 'SB-Mid-client-JhafoaqITHV_ADvX'; // Client key Midtrans Anda
$config['is_production'] = false; // false untuk sandbox/testing, ubah ke true untuk production
$config['is_sanitized'] = true; // Menjaga data transaksi tetap aman
$config['is_3ds'] = true; // Mengaktifkan 3D Secure untuk transaksi kartu kredit
