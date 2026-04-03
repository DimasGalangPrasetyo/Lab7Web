# PRAKTIKUM CODEIGNITER 4

Praktikum ini berisi tutorial atau pengenalan framework codeigniter untuk mengembangkan atau membuat web dasar

## Praktikum 1

Untuk langkah awal kita akan mempersiapkan alat dan bahan yang diperlukan untuk praktikum ini.

### Alat dan bahan
unduh dan install alat dan bahan terlebih dahulu

* Visual Studio code [link download](https://code.visualstudio.com/download)
* XAMPP [Link download](https://www.apachefriends.org/download.html)
* Composer [Link download](https://getcomposer.org/download/)


### Langkah-langkah praktikum
setelah alat dan bahan selesai diinstall selanjutnya adalah mempersiapkannya

#### Persiapan XAMPP
Tampilan XAMPP setelah diunduh dan berhasil dinstall atau XAMPP control panel
<img width="1366" height="768" alt="tampilan xampp" src="https://github.com/user-attachments/assets/aaf5f778-a4f6-49c5-84a9-3d565b6c026e" />

---

Langkah pertama adalah mempersiapkan XAMPP agar framework dapat digunakan. Ada beberapa ekstensi yang perlu diaktifkan sebelum framework digunakan, untuk mengaktifkannya kita perlu menuju ke **Config > php.ini**
<img width="1366" height="768" alt="xampp setup" src="https://github.com/user-attachments/assets/6f3211d3-5207-4429-8406-764b8ac66f9c" />

---

Hapus tanda ";" yang berada didepan ekstensi untuk mengaktifkan, aktifkan ekstensi yang diperlukan untuk kebutuhan framework
<img width="1366" height="768" alt="php ini" src="https://github.com/user-attachments/assets/9e497b4e-c94a-4d27-acb5-13793e33c012" />

---

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
