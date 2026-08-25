<!DOCTYPE html>
<html>

<head>
    <title>Import Mattress Prices</title>

    <style>
        body {
            font-family: Arial;
            padding: 40px;
        }

        .container {
            max-width: 500px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        button {
            padding: 12px 20px;
            cursor: pointer;
        }

        .success {
            color: green;
            margin-bottom: 20px;
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Import Mattress Prices CSV</h2>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())

            <div class="error">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form action="{{ url('/import-mattress-prices') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <label>
                Product ID
            </label>

            <input type="number" name="product_id" required>

            <label>
                CSV File
            </label>

            <input type="file" name="file" accept=".csv" required>

            <button type="submit">
                Import Prices
            </button>

        </form>

    </div>

</body>

</html>
