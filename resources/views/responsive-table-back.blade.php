<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css" />

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <table
                    summary="This table shows how to create responsive tables using Datatables' extended functionality"
                    class="table table-bordered table-hover dt-responsive">
                    <caption class="text-center">An example of a responsive table based on <a
                            href="https://datatables.net/extensions/responsive/" target="_blank">DataTables</a>:
                    </caption>
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Languages</th>
                            <th>Population</th>
                            <th>Median Age</th>
                            <th>Area (Km²)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Argentina</td>
                            <td>Spanish (official), English, Italian, German, French</td>
                            <td>41,803,125</td>
                            <td>31.3</td>
                            <td>2,780,387</td>
                        </tr>
                        <tr>
                            <td>Australia</td>
                            <td>English 79%, native and other languages</td>
                            <td>23,630,169</td>
                            <td>37.3</td>
                            <td>7,739,983</td>
                        </tr>
                        <tr>
                            <td>Greece</td>
                            <td>Greek 99% (official), English, French</td>
                            <td>11,128,404</td>
                            <td>43.2</td>
                            <td>131,956</td>
                        </tr>
                        <tr>
                            <td>Luxembourg</td>
                            <td>Luxermbourgish (national) French, German (both administrative)</td>
                            <td>536,761</td>
                            <td>39.1</td>
                            <td>2,586</td>
                        </tr>
                        <tr>
                            <td>Russia</td>
                            <td>Russian, others</td>
                            <td>142,467,651</td>
                            <td>38.4</td>
                            <td>17,076,310</td>
                        </tr>
                        <tr>
                            <td>Sweden</td>
                            <td>Swedish, small Sami- and Finnish-speaking minorities</td>
                            <td>9,631,261</td>
                            <td>41.1</td>
                            <td>449,954</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center">Data retrieved from <a
                                    href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a>
                                and <a href="http://www.worldometers.info/world-population/population-by-country/"
                                    target="_blank">worldometers</a>.</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
</body>

</html>
