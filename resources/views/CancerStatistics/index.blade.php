<html>
    <head>
        <title>台灣癌症調查資料</title>
        <style>
            /* 設定表格背景顏色 */
            table {
                background-color: lightblue;
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                border: 1px solid black;
                text-align: center;
            }
            header {
            background-image: linear-gradient(rgba(110, 110, 110, 0.736), rgba(110, 110, 110, 0.736)),
            url('https://img.tusij.com/qiantu_assets/user_download_ue/2021-05-26/qt_ac0aa92b59f5677a9ee4dbabb270db00_34872.jpg%21w390?auth_key=1746835200-0-0-cc5b792040d01677a9f170d9e1d49f17');
            background-position: center;
            background-repeat: repeat;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            color: white;
            }
        </style>
    </head>
    <body>
        <header>
        <h1>台灣癌症調查資料</h1>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>診斷年份</th>
                    <th>性別</th>
                    <th>縣市別</th>
                    <th>癌症別</th>
                    <th>年齡標準化發生率 (每10萬人口)</th>
                    <th>癌症發生數</th>
                    <th>平均年齡</th>
                    <th>年齡中位數</th>
                    <th>粗率 (每10萬人口)</th>
                    <th>創建時間</th>
                    <th>更新時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cancerstatistics as $cancer)
                    <tr>
                        <td>{{$cancer->id}}</td>
                        <td>{{$cancer->cancer_diagnosis_year}}</td>
                        <td>{{$cancer->gender}}</td>
                        <td>{{$cancer->city_county}}</td>
                        <td>{{$cancer->cancer_type}}</td>
                        <td>{{$cancer->age_standardized_incidence_rate_who_2000}}</td>
                        <td>{{$cancer->cancer_cases}}</td>
                        <td>{{$cancer->average_age}}</td>
                        <td>{{$cancer->median_age}}</td>
                        <td>{{$cancer->crude_rate}}</td>
                        <td>{{$cancer->created_at}}</td>
                        <td>{{$cancer->updated_at}}</td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </body>
</html>
