<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        @foreach ($cancer_statistics as $cancer)
            <tr>
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
    </table>
</body>
</html>