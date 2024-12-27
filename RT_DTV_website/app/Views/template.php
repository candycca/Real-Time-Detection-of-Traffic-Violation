<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>即時車輛偵測違規系統</title>
    <style>
        /* 整體佈局 */
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* 左邊的側邊欄樣式 */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #333;
            color: white;
            padding: 20px 15px; /* 調整內邊距 */
            position: fixed;
            overflow: auto; /* 如果內容太多，可滾動 */
        }

        .sidebar h2, .sidebar a {
            margin-left: 10px; /* 增加左側邊距，避免貼邊 */
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Logout連結固定在底部 */
        .logout {
            position: absolute;
            bottom: 70px; /* 與底部的距離 */
        }

        /* 右邊內容區域，包含圖片 */
        .content {
            margin-left: 270px; /* 增加側邊欄寬度 */
            padding: 20px;
            flex-grow: 1;

            /* 增加與底部的距離 */
            padding-bottom: 70px; /* 與底部的距離，根據需求調整 */

            /* 將內容居中 */
            display: flex;
            align-items: center; /* 垂直居中 */
            height: 100vh; /* 讓內容區域高度充滿頁面，便於垂直居中 */
            flex-direction: column; /* 垂直排列 */
            box-sizing: border-box;
        }

        /* 圖片容器，用於垂直排列圖片 */
        .img-container {
            display: flex;
            flex-direction: column; /* 垂直排列 */
            align-items: center; /* 水平居中 */
            margin-top: 20px; /* 與上方元素的間隙 */
        }

        .img-container img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px; /* 每張圖片之間的距離 */
            border: 5px solid #ddd;
        }
    </style>
    <link href="<?= base_url('styles.css') ?>" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
    $authority = $_SESSION['authority'];
?>

<!-- 側邊欄區域 -->
<div class="sidebar">
    <h2>RT-DTV</h2>
    <a href="/Home">首頁</a>

    <?php if ($authority === 2): ?>
        <a href="/UploadController">上傳影片</a>
        <a href="/RunController">手動偵測</a>
    <?php endif; ?>
    <a href="/MonitorController/only_one_screen">自動偵測</a>
    <a href="/FindController/find_car_with_monitor">搜尋違規車</a>
    <a href="/LoginController/logout" class = "logout">登出</a>
</div>

<!-- 內容區域 -->
<div class="content">
    <h1>Real-Time Detection of Traffic Violation</h1>
    <br>
    <?= $this->renderSection('content') ?>
</div>


<script>
    <?= $this->renderSection('script') ?>
</script>
</body>
</html>
