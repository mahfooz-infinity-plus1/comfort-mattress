@extends('layouts.master')
@section('title','About')
@section('content')
<style>
  .test{
    margin-top: 150px;
  }
  .test ul{
    list-style: unset;
    padding: 10px 30px;
  }
  li {
    margin-top: 10px;
}
.test h3{
    font-size: 19.2px;
}

</style>


<div class="container test">
    <h2 style="text-align: center">Return and Refund</h2>
    <section class="my-4">
        <h3>Introduction</h3>
        <p>Welcome to Comfort Mattress. These Terms and Conditions outline the rules and regulations for the use of our website and the purchase of our comfort mattresses. By accessing this website and/or purchasing our products, you agree to comply with these terms.</p>
    </section>
    <section class="my-4">
        <h3>Returns and Refunds</h3>
        <ul>
            <li><p><strong>Return Policy:</strong> If you are not completely satisfied with your comfort mattress, you may return it within 30 to 60  days of delivery for a full refund or exchange. The mattress must be in its original condition, with no signs of wear or damage.</p></li>
            <li><p><strong>Refunds:</strong> Refunds will be processed within 7 to 14  business days after we receive the returned product. The refund will be credited to the original payment method.</p></li>
            <li><p><strong>Return Process:</strong> To initiate a return, please contact our customer service team with your order number and reason for return. We will provide you with a return authorization and instructions on how to ship the product back to us.</p></li>
            <li><p><strong>Return Shipping:</strong> You are responsible for return shipping costs unless the return is due to a defect or error on our part. We recommend using a trackable shipping service to ensure that your return is received and processed promptly.</p></li>
            <li><p><strong>Exchange Policy:</strong> If you wish to exchange your mattress for a different size or model, please follow the return process and place a new order for the desired product. The exchange will be processed once the original product is returned and inspected.</p></li>
        </ul>
    </section>
    <section class="my-4">
        <h3>Contact Information</h3>
        <ul>
            <li><p>If you have any questions or concerns regarding these Returns and Refunds policies, please contact us at info@comfort-mattress.com. Our customer service team is available to assist you with any inquiries and provide support as needed.</p></li>
            <li><p>We value your feedback and are always looking for ways to improve our products and services. Whether you have a question about a return, need help with a refund, or want to provide feedback, we are here to help.</p></li>
            <li><p>Please feel free to reach out to us via phone, email, or our contact form. We strive to respond to all inquiries promptly and provide the assistance you need.</p></li>
        </ul>
    </section>
</div>



@endsection