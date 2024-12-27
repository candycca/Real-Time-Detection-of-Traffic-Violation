## 1.需要修改的路徑

a. RT_DTV_website/app/config/App.php

Line20 : baseURL(架設的伺服器IP)


b. RT_DTV_website/app/Commands/Websocket.php

Line16 : python_path(python環境執行檔 ex .../python.exe)


c. RT_DTV_website/public/python/car_track_website.py

Line70 : ip(同baseURL)


d. RT_DTV_website/public/python/website.py

Line11 : WEBSOCKET_PORT 可以改成自己想要的PORT


e. RT_DTV_website/app/Views/runs/show_video.php

Line33 : ip(port同public/python/website.py)


f. RT_DTV_website/app/Views/monitors/only_one_screen.php

Line64 : ip(port同public/python/website.py)




## 2.網站啟動指令

### 步驟1： cd 到 RT_DTV_website資料夾

### 步驟2： 輸入指令 php spark serve --host 0.0.0.0 (開啟server) 

成功會顯示以下畫面

![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/php.png)

### 步驟3： 輸入指令 php spark websocket:start (開啟python程式)

成功會顯示以下畫面

![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/websocket.png)

### 步驟4：檢查網頁是否成功啟動

a. 點擊步驟1生成的網址，進入登入畫面

![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/登入.png)

b. 輸入帳密後，進到首頁

![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/首頁.png)

c. 點擊自動偵測，並進入開發者模式，若主控台顯示訊息「websocket已連線」即代表成功啟動

![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/成功.png)

## 3.網頁登入的帳密

帳號 : a

密碼 : a
