<html>
    <head>
        <title>List Report</title>
        <style>
            * {
                font-family: 'Arial', sans-serif;
            }
            .table-header{
                border-collapse: collapse;
                border: 1px solid black;
                width: 100%;
            }

            .table-body {
                border-collapse: collapse;
                width: 100%;
            }

            .table-body td, .table-body th{
                border: 1px solid black;
                padding: 5px;
                font-size: 11px
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
            <tbody class="table-body">
                @foreach($data as $data)
                <tr>
                    <td>{{ $data->document_code}}-{{$data->document_number}}</td>
                    <td>{{ $data->username->name ?? '-'}}</td>
                    <td>Rp. {{ number_format($data->total) }}</td>
                    <td>{{ $data->date }}</td>
                    <td>
                        @if($data->detail->isNotEmpty())
                            @foreach($data->detail as $detail)
                                {{ $detail->product_name }}<br>
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
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
