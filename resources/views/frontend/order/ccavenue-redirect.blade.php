<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to CCAvenue...</title>
</head>
<body onload="document.ccavenue_form.submit();">
    <div style="text-align: center; margin-top: 100px;">
        <h2>Please wait, redirecting to payment gateway...</h2>
        <p>Do not refresh this page.</p>
    </div>
    
    @php
        $url = env('CCAVENUE_TEST_MODE') 
            ? 'https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
            : 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction';
    @endphp

    <form method="post" name="ccavenue_form" action="{{ $url }}">
        <input type="hidden" name="encRequest" value="{{ $encrypted_data }}">
        <input type="hidden" name="access_code" value="{{ $access_code }}">
    </form>
</body>
</html>
