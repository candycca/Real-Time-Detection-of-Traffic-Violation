# 即時車輛違規系統

## 簡介
  傳統的車燈違規偵測方式需要警方投入大量人力來監控車輛是否違規，這不僅耗費了大量的時間和人力成本，還容易導致誤判。為了減少警方的人力負擔，並提升交通執法的效率，我們研發一套基於人工智慧的自動化車燈違規偵測系統，取代傳統的人工方式，提高執法的效率及準確率。


## 使用環境
- **作業系統**： Linux 
- **開發環境**：本地開發 (localhost)
- **伺服器環境**： PHP server with Port Forward (端口轉發)
- **程式語言**： 
  - PHP 
  - Python
- **資料庫**：SQLite3


## 前置準備

1. **安裝所需套件:**
   
    - python == 3.8
    - pandas == 2.0.3
    - numpy == 1.24.3
    - opencv-python == 4.10.0.84
    - torch == 2.4.0+cu118  
    - torchvision == 0.19.0+cu118
    - torchaudio == 2.4.0+cu118
    - ultralytics == 8.3.21
    - pillow == 10.4.0 
    - matplotlib == 3.7.5
    - tqdm == 4.66.5
    - websockets == 13.1


## 訓練與測試

### 訓練模型
1. 執行訓練指令：
    - 轉彎模型
      ```bash
      python ResNet_train/train.py
      ```
    - light_model_method--SegNet
      ```bash
      python SegNet/train.py
      ```

    - light_model_method--CNNLSTM
      ```bash
      python CNNLSTM/train.py
      ```
    

### 測試模型
1. 執行測試指令：
   - 轉彎模型
      ```bash
      python ResNet_train/test.py
      ```
   - 系統主程式
      ```bash
      python ccc.py --name filefolder  --save 0/1,0/1,0/1,0/1  --turn r/l/n
      ```
      filefolder：測試影片的資料夾路徑    
   - light_model_method--SegNet
      ```bash
      python SegNet/test.py --samples test_folder --outputs output_folder
      ```
      test_folder：測試影片的資料夾路徑  
      output_folder：存放輸出結果的資料夾路徑  
     
     

## 功能說明
1. **light_model_method--SegNet:**
   - 輸入：車輛照片
   - 輸出：車燈遮罩
  
1. **light_model_method--CNNLSTM:**
   - 輸入：車輛序列
   - 輸出：是否違規
     
2. **系統主程式：輸入車輛影片，檢測該影片中車輛是否有違規行為。**
   - 輸入：車輛影片資料
   - 輸出：違規車輛的照片以及相關資訊
  
3. **網頁：提供執行程式的網頁，包含手動執行以及自動執行。**
   - 登入
   - 自動偵測：供使用者即時查看網頁中播放的影片之違規資訊。
   - 上傳影片：供使用者上傳想要單獨偵測的影片。
   - 手動偵測：供使用者選擇影片並手動執行程式去做偵測。
   - 搜尋違規車：供使用者查看上傳影片的偵測結果。

## 模型架構
![image](https://github.com/candycca/CCU-Headlight-violation-detection-system/blob/main/docs/%E7%B3%BB%E7%B5%B1%E6%9E%B6%E6%A7%8B%E5%9C%96.png)


## 系統流程
![image](https://github.com/candycca/Real-Time-Detection-of-Traffic-Violation/blob/ccc/docs/系統架構.png)



  
     
## 文件結構

```bash
|-- Real-Time-Detection-of-Traffic-Violation/
    |-- turn_model_train/  # 轉彎模型訓練    
    |-- light_model_train/ # 車燈模型訓練
        |--train.py  
    |-- main/              # 系統主程式
        |--weight/
           |--yolov8n.pt   # 車輛追蹤
           |--turn.pth     # 轉彎判斷
           |--light.pt     # 車燈判斷
        |--screenshot.py
        |--main.py
        |--car_track.py    # 車輛偵測
        |--turn.py         # 轉彎判斷
        |--turn_model.py   # 轉彎模型
        |--light.py        # 車燈判斷
        |--screenshot.py   # 產生違規照片
    |-- light_model_method    # 車燈模型改善方法
        |-- CNNLSTM/             
        |-- SegNet/ 
    |-- RT_DTV_website           # PHP website
        |-- app/                 # PHP app
        |-- database/            # SQLite3 資料庫
        |-- public/              # 前端文件
            |-- style.css        # 前端樣式
        |-- scripts/             # 訓練與測試的 Python 腳本
            |-- main_website.py  # 網站自動化偵測違規
    |-- output/                             # 存放所有結果
        |-- demo_video/
            |-- video/
                |-- video_output.webm       # yolo bounding box video
                |-- carimg/                 # 儲存車輛序列圖
                |-- turn_info/              # 儲存車輛軌跡圖以及轉彎模型預測結果
                    |-- turn_predict.csv    # 轉彎模型預測結果
                |-- light_info/             # 儲存亮暗波型圖以及違規模型預測結果
                    |-- light_predict.csv   # 違規模型預測結果
                |-- violation/              # 儲存違規照片 
    |-- README.md          # 專案說明文件

```
