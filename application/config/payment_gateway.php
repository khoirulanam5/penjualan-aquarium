<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['server_key'] = ''; // Server key Midtrans Anda
$config['client_key'] = ''; // Client key Midtrans Anda
$config['is_production'] = false; // false untuk sandbox/testing, ubah ke true untuk production
$config['is_sanitized'] = true; // Menjaga data transaksi tetap aman
$config['is_3ds'] = true; // Mengaktifkan 3D Secure untuk transaksi kartu kredit
