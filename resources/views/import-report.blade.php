<!DOCTYPE html>
<html>

<head>
    <title>Import Report</title>

    <style>
        body {
            font-family: Arial;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        h2 {
            margin-top: 40px;
        }

        .summary {
            background: #f5f5f5;
            padding: 20px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <h1>Mattress Import Report</h1>

    <div class="summary">

        <h2>Summary</h2>

        <p>
            Total Rows:
            {{ $report['total_rows'] }}
        </p>

        <p>
            Processed Variants:
            {{ $report['processed_variants'] }}
        </p>

        <p>
            Updated Variants:
            {{ $report['summary']['total_updated_variants'] }}
        </p>

        <p>
            Created Variants:
            {{ $report['summary']['total_created_variants'] }}
        </p>

        <p>
            Created Colors:
            {{ $report['summary']['total_created_colors'] }}
        </p>

        <p>
            Skipped Rows:
            {{ $report['summary']['total_skipped_rows'] }}
        </p>

    </div>

    <h2>Updated Variants</h2>

    <table>

        <tr>
            <th>Variant ID</th>
            <th>Dimension</th>
            <th>Thickness</th>
            <th>Size</th>
            <th>Old MRP</th>
            <th>New MRP</th>
        </tr>

        @foreach ($report['updated_variants'] as $item)
            <tr>
                <td>{{ $item['variant_id'] }}</td>
                <td>{{ $item['dimension'] }}</td>
                <td>{{ $item['thickness'] }}</td>
                <td>{{ $item['size'] }}</td>
                <td>{{ $item['old_mrp'] }}</td>
                <td>{{ $item['new_mrp'] }}</td>
            </tr>
        @endforeach

    </table>

    <h2>Created Variants</h2>

    <table>

        <tr>
            <th>Variant ID</th>
            <th>Dimension</th>
            <th>Thickness</th>
            <th>Size</th>
            <th>MRP</th>
        </tr>

        @foreach ($report['created_variants'] as $item)
            <tr>
                <td>{{ $item['variant_id'] }}</td>
                <td>{{ $item['dimension'] }}</td>
                <td>{{ $item['thickness'] }}</td>
                <td>{{ $item['size'] }}</td>
                <td>{{ $item['mrp'] }}</td>
            </tr>
        @endforeach

    </table>

    <h2>Created Colors</h2>

    <table>

        <tr>
            <th>Color ID</th>
            <th>Title</th>
        </tr>

        @foreach ($report['created_colors'] as $item)
            <tr>
                <td>{{ $item['color_id'] }}</td>
                <td>{{ $item['title'] }}</td>
            </tr>
        @endforeach

    </table>

    <h2>Skipped Rows</h2>

    <table>

        <tr>
            <th>Dimension</th>
            <th>Reason</th>
        </tr>

        @foreach ($report['skipped_rows'] as $item)
            <tr>
                <td>{{ $item['dimension'] }}</td>
                <td>{{ $item['reason'] }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>
