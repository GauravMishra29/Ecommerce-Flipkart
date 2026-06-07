<!DOCTYPE html>
<html>
<head>
    <title>Flipkart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>.home-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#2874f0;
    color:white;
    padding:10px 18px;
    border-radius:6px;
    text-decoration:none;
    font-size:15px;
    font-weight:500;
    transition:0.3s;
}

.home-btn:hover{
    background:#0f5cd1;
}</style>
</head>
<body>

<header class="container">
    <div class="logo">Flipkart</div>

    <nav>
        @if(!request()->is('/'))

<a href="/" class="home-btn">
    Home
</a>

@endif
        @if(request()->is('/'))

<a href="#" class="location-btn">
    Select Delivery Location >
</a>

@endif
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<section class="fk-why-section">

    <div class="fk-why-block">

        <h3>Why Choose Flipkart?</h3>
        <p>
            Flipkart offers a trusted and seamless online shopping experience with millions of products,
            reliable delivery, and easy returns. Customers enjoy secure payments and verified sellers. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed cum facere sint dolores consequatur debitis illo quam, modi officiis architecto necessitatibus deserunt blanditiis eum asperiores sit omnis eaque pariatur tempora eveniet ab ullam non recusandae! Neque voluptas minima voluptatum molestias. Provident ipsam alias nihil eveniet veritatis, assumenda deserunt id eius!
        </p>

    </div>

    <div class="fk-why-block">

        <h3>Shop Smart</h3>
        <p>
            Compare prices, read genuine reviews, and choose from a wide range of categories.
            Flipkart helps you make informed decisions for smarter shopping every time. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui vero natus suscipit numquam corrupti! Quos aliquam dolor, ad ab quam voluptas inventore quod mollitia provident magni reprehenderit possimus fugit? Molestiae, veritatis perferendis? Dolore beatae officia explicabo. Dolorum officiis sint ducimus necessitatibus atque magni aliquam quod, facere cupiditate explicabo natus dolores eaque? Facilis repellat eveniet voluptatem vel debitis asperiores commodi! Quos deserunt harum excepturi, itaque tempora odit dolorem quidem deleniti cum?
        </p>

    </div>

    <div class="fk-why-block">

        <h3>Pay Smarter</h3>
        <p>
            Enjoy multiple payment options including UPI, cards, wallets, and COD.
            All transactions are secure and protected for a worry-free checkout experience. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab blanditiis sequi nam tenetur. Perspiciatis vero laudantium iusto repudiandae commodi minima cum rerum voluptates quisquam? Adipisci velit laborum maxime dignissimos quam. Aspernatur quidem rerum tempore aliquam quasi illo vero eum, aliquid illum a. Sint, esse. Repellendus inventore, laudantium, facilis eum adipisci reprehenderit exercitationem maiores in nulla eveniet, animi consectetur deleniti aliquid dolorem? Eos delectus temporibus adipisci odio porro eius nemo, quidem illo vero qui, amet modi fugit magni, impedit ad accusamus molestias harum ratione doloremque officiis? Omnis quis excepturi consequatur corporis rerum facere harum beatae voluptates exercitationem, reiciendis cum? Id?
        </p>

    </div>

    <div class="fk-why-block">

        <h3>Fast & Reliable Delivery</h3>
        <p>
            Get your orders delivered quickly with Flipkart’s strong logistics network.
            Track your order in real-time and receive doorstep delivery across India. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero adipisci ad aut repellendus labore ex impedit voluptatum suscipit fuga deleniti, eos perferendis aliquam eius at voluptas quia totam. Voluptas explicabo deleniti sequi vitae incidunt soluta dicta reprehenderit neque tempora. Repellendus amet odit doloremque, harum assumenda aliquam ut reprehenderit nobis nulla officia maiores deleniti, impedit ipsum et iste quisquam! Ab unde voluptates, asperiores assumenda architecto ratione magni velit. Minus, molestias dicta.
        </p>

    </div>

</section>

<footer class="footer">
    
    <div class="footer-container">

        <div class="footer-box">
            <h3>About Flipkart</h3>

            <p>
                Flipkart is your trusted online shopping platform
                for electronics, fashion, gadgets, gaming and more.
            </p>
        </div>
        
        <div class="footer-box">
            <h3>Quick Links</h3>

            <a href="/">Home</a>
            <a href="/cart">Cart</a>
            <a href="/category/Mobiles">Mobiles</a>
            <a href="/category/Fashion">Fashion</a>
        </div>

        <div class="footer-box">
            <h3>Customer Support</h3>

            <p>Email: support@shopora.com</p>
            <p>Phone: +91 9876543210</p>
            <p>Available: 24/7</p>
        </div>

        <div class="footer-box">
            <h3>Address</h3>

            <p>
                Shopora Pvt Ltd<br>
                Gomti Nagar, Lucknow<br>
                Uttar Pradesh, India
            </p>
        </div>
        
    </div>
    
    <div class="footer-bottom">
        © 2026 Shopora. All Rights Reserved.
    </div>

</footer>
</body>
</html>