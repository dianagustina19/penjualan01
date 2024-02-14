<html>
    <head>
        <title>List Report</title>
        <style>
            * {
                font-family: 'Arial', sans-serif;
            }
            .table-header{
                border-collapse: collapse;
                width: 100%;
            }

            .table-body {
                border-collapse: collapse;
                width: 100%;
            }

            .table-body th{
                /* background-color: #4F71BE; */
                /* color: white; */
                font-size: 12px
            }

            .table-body td, .table-body th{
                border: 1px solid black;
                padding: 5px;
                font-size: 11px
            }
            
            .font-size-11{
                font-size: 11px;
            }

            .text-center {
                text-align: center;
            }

            .logo {
                width: 100px;
            }

            .text-container {
                flex-grow: 1;
                text-align: center;
                text-transform: uppercase;
                padding-left: 300px; /* Sesuaikan sesuai kebutuhan */
            }

            .logo-container {
                margin-right: 100px; /* Tambahkan margin kanan sesuai kebutuhan */
            }

            .header {
                font-size: 18px;
                font-weight: bold;
            }

            .project-name {
                font-size: 15px;
                font-weight: bold;
                color: black;
            }
        </style>
    </head>
    <body>
        <center><h4>List Report</h4></center>
        <table border="1" class="table-header">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Item</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $data)
                <tr>
                    <td>{{ $data->document_code}}-{{$data->document_number}}</td>
                    <td>{{ $data->user->name ?? '-'}}</td>
                    <td>{{ $data->total}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->detail ?? '-'}}</td>
               
                </tr>
                @endforeach
            </tbody>
        </table>

        <script type="text/php">
            if(isset($pdf)) {
                $font = $fontMetrics->getFont("Segoe UI, Trebuchet MS, Tahoma, Verdana, sans-serif", "normal");
                $pdf->page_text(520, 800, "<?php echo 'Page {PAGE_NUM} of {PAGE_COUNT}'; ?>", $font, 10, array(0,0,0));
            }
        </script>
    </body>
</html>
