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
    <h2 style="text-align: center">Terms and Conditions</h2>
    <section class="my-4">
        <h3>Introduction</h3>
        <p>Welcome to Comfort Mattress. These Terms and Conditions outline the rules and regulations for the use of our website and the purchase of our comfort mattresses. By accessing this website and/or purchasing our products, you agree to comply with these terms.</p>
    </section>
    <section class="my-4">
        <h3> Eligibility</h3>
        <ul>
            <li><p>To purchase from our website, you must be at least 18 years old and possess a valid payment method. By placing an order, you confirm that you meet these criteria. This ensures that all transactions are legally binding and that we can fulfill our obligations to you.</p></li>
            <li><p>We reserve the right to refuse service, terminate accounts, or cancel orders at our discretion, particularly if we believe that you do not meet the eligibility criteria. Additionally, we may require proof of age or payment authorization before processing your order.</p></li>
            <li><p>If you are under 18, you may use our website only with the involvement of a parent or guardian. We encourage families to discuss the use of our website and the importance of making informed purchasing decisions.</p></li>
        </ul>
    </section>
    <section class="my-4">
        <h3>Product Information</h3>
        <ul>
            <li><p>comfort mattresses are designed with the highest quality materials and craftsmanship. We strive to provide accurate descriptions and images of our products on our website. However, slight variations in color, texture, and appearance may occur due to manufacturing processes or screen settings.</p></li>
            <li> <p>We regularly update our product descriptions to ensure that they reflect the latest product specifications. However, we cannot guarantee that all information is entirely free from errors or omissions. In the event of an error, we reserve the right to correct it without prior notice.</p></li>
            <li> <p>If you have any specific questions about a product, please contact our customer service team before making a purchase. We are happy to provide additional information to help you make an informed decision.</p></li>
        </ul>
        


    </section>
    <section class="my-4">
        <h3>Orders and Payment</h3>
        <ul style="">
            <li><p><strong>Order Confirmation:</strong> Once an order is placed, you will receive an email confirmation detailing the products purchased, prices, and estimated delivery time.</p></li>
            <li><p><strong>Payment:</strong> We accept payments via paytm. Payment must be made in full before the order is processed and shipped.</p></li>
            <li><p><strong>Order Cancellation:</strong> You may cancel your order within  5 to 7 hours of placing it for a full refund. After this period, cancellation requests will be subject to our return policy.</p></li>
        </ul>
        
    </section>
    <section class="my-4">
        <h3> Shipping and Delivery</h3>
        <ul>
            <li><p><strong>Shipping:</strong> We offer standard shipping on all our comfort mattresses. Please refer to our shipping policy for more details on delivery times and charges.</p></li>
            <li><p><strong>Delivery:</strong> Delivery times are estimated and may vary due to external factors. We are not responsible for delays caused by the shipping carrier or other circumstances beyond our control.</p></li>
        </ul>
        
        
    </section>
    {{-- <section class="my-4">
        <h3> Returns and Refunds</h3>
        <ul>
            <li><p><strong>Return Policy:</strong> If you are not completely satisfied with your comfort mattress, you may return it within [X] days of delivery for a full refund or exchange. The mattress must be in its original condition, with no signs of wear or damage.</p></li>
            <li><p><strong>Refunds:</strong> Refunds will be processed within [X] business days after we receive the returned product. The refund will be credited to the original payment method.</p></li>
        </ul>
  
    </section> --}}
    
    <section class="my-4">
        <h3> Warranty</h3>
        <ul>
            <li><p>Our comfort mattresses come with a 10 to 20 year limited warranty, covering manufacturing defects. This warranty does not cover normal wear and tear, misuse, or damages caused by improper handling or storage. We stand behind the quality of our products and are committed to ensuring their longevity.</p></li>
            <li>        <p>In the event that you encounter a manufacturing defect, please contact us immediately. We will assess the issue and, if necessary, provide a replacement or repair at no cost to you. Please retain your proof of purchase and any warranty documentation provided at the time of purchase.  </p></li>
        </ul>
        

       
    </section>
    
    <section class="my-4">
        <h3> Privacy Policy</h3>
        <ul>
            <li><p>Your privacy is important to us. Please review our <a href="#">Privacy Policy</a> to understand how we collect, use, and protect your personal information. We are committed to safeguarding your data and ensuring that your privacy is respected at all times.</p></li>
            <li><p>Our Privacy Policy outlines the types of information we collect, how we use it, and the measures we take to protect it. We do not sell or share your personal information with third parties without your consent, except as required by law.</p></li>
            <li><p>By using our website, you consent to the collection and use of your information as described in our Privacy Policy. If you have any concerns about your privacy, please contact us, and we will be happy to address them.</p></li>
        </ul>
        
        
        
    </section>
    
    <section class="my-4">
        <h3>Limitation of Liability</h3>
        <ul>
            <li><p>Our liability is limited to the cost of the product purchased. We are not liable for any indirect, incidental, or consequential damages arising from the use of our comfort mattresses or website. This limitation of liability is essential to maintaining the affordability and accessibility of our products.</p></li>
            <li><p>While we strive to ensure that our products and services meet your expectations, we cannot guarantee that they will be free from all defects or issues. In the unlikely event that you experience a problem, our customer service team is available to assist you in finding a resolution.</p></li>
            <li><p>Please note that some jurisdictions may not allow the exclusion or limitation of certain types of damages. In such cases, our liability will be limited to the fullest extent permitted by law.</p></li>
        </ul>
        
        
        
    </section>
    
    <section class="my-4">
        <h3> Governing Law</h3>
        <ul>
            <li><p>These terms and conditions are governed by the laws of india.
                {{-- Any disputes arising from these terms or your use of our website shall be resolved in the courts of [Your Jurisdiction] --}}
                 We are committed to complying with all applicable laws and regulations and expect our customers to do the same.</p></li>
            <li><p>In the event of a legal dispute, we encourage you to contact us first to seek an amicable resolution. We believe that open communication can often resolve issues without the need for legal action.</p></li>
            {{--    <li><p>By using our website and purchasing our products, you agree to submit to the jurisdiction of the courts in [Your Jurisdiction]. This ensures that any legal matters are handled fairly and consistently according to the laws of our location. </p></li> --}}
        </ul>
        
        

    </section>
    
    <section class="my-4">
        <h3> Changes to Terms</h3>
        <ul>
            <li><p>We reserve the right to modify these Terms and Conditions at any time. Any changes will be posted on this page and will take effect immediately upon posting. It is your responsibility to review these terms periodically to stay informed of any updates.</p></li>
            <li><p>If you continue to use our website after changes are made, you will be deemed to have accepted the updated terms. We recommend that you bookmark this page and check it regularly to ensure that you are aware of any modifications.</p></li>
            <li><p>If you have any questions or concerns about changes to these terms, please contact us. We are always here to help clarify any points and provide additional information as needed.</p></li>
        </ul>
        
    </section>
    
    <section class="mt-4 mb-5">
        <h3> Contact Information</h3>
        <ul>
            <li><p>If you have any questions or concerns regarding these Terms and Conditions, please contact us at [Your Contact Information]. Our customer service team is available to assist you with any inquiries and provide support as needed.</p></li>
            <li><p>We value your feedback and are always looking for ways to improve our products and services. Whether you have a question about an order, need help with a return, or want to provide feedback, we are here to help.</p></li>
            <li><p>Please feel free to reach out to us via phone, email, or our contact form. We strive to respond to all inquiries promptly and provide the assistance you need.</p></li>
        </ul>
    </section>
</div>



@endsection