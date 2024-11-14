<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/table.css') }}">
    <title>Table</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>cancer_diagnosis_year(癌症診斷的年份)</th>
                <th>gender(性別（例如：男性、女性、全等）)</th>
                <th>city(縣市別)</th>
                <th>cancer_type(癌症類型（例如：口腔、胃等）)</th>
                <th>age_standardized_incidence_rate(年齡標準化發生率 (WHO 2000 世界標準人口 每10萬人口))</th>
                <th>cancer_cases(癌症的發生數量)</th>
                <th>average_age(平均年齡)</th>
                <th>median_age(年齡中位數)</th>
                <th>crude_rate(粗率 (每10萬人口))</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cancer_statistics as $index => $cancer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$cancer->cancer_diagnosis_year}}</td>
                    <td>{{$cancer->gender}}</td>
                    <td>{{$cancer->city}}</td>
                    <td>{{$cancer->cancer_type}}</td>
                    <td>{{$cancer->age_standardized_incidence_rate}}</td>
                    <td>{{$cancer->cancer_cases}}</td>
                    <td>{{$cancer->average_age}}</td>
                    <td>{{$cancer->median_age}}</td>
                    <td>{{$cancer->crude_rate}}</td>
                </tr>
            @endforeach
        </tbody>   
    </table>
</body>
</html>