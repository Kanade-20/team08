<html>
    <head>
        <title>台灣癌症調查資料</title>
    </head>
    <body>
        <h1>台灣癌症調查資料</h1>

        <table border="1">
            @foreach ($cancerstatistics as $cancer)
                <tr>
                    <td>{{$cancer->cancer_diagnosis_year}}</td>
                    <td>{{$cancer->gender}}</td>
                    <td>{{$cancer->city_county}}</td>
                    <td>{{$cancer->cancer_type}}</td>
                    <td>{{$cancer->age_standardized_incidence_rate_who_2000}}</td>
                </tr>    
            @endforeach
        </table>    
    </body>
</html>