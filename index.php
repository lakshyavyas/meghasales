<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megha Sales - Premium Electronics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Global Styles */
        :root {
            --primary: #6C63FF;
            --secondary: #FF6584;
            --dark: #2D3436;
            --light: white;
            --gradient: linear-gradient(135deg, rgba(108,99,255,0.95), rgba(255,101,132,0.95));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            line-height: 1.6;
            background: #f8f9fa;
        }

        /* Navigation */
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 4rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            position: relative;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 1rem;
            background-image: url(images/back1.webp);
            background-size: auto;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            font-weight: 800;
            color: var(--light);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 2.2rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 2rem;
            font-weight: 500;
            

        }

        .cta-button {
            display: inline-block;
            padding: 1rem 3rem;
            border: none;
            border-radius: 50px;
            background: var(--gradient);
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
        }

        /* Inventory Section */
        .inventory-section {
            padding: 8rem 4rem 4rem;
        }

        .inventory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 1rem 0;
        }

        .inventory-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            position: relative;
        }

        .inventory-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .inventory-info {
            padding: 2rem;
        }

        .inventory-category {
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .inventory-title {
            font-size: 1.4rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .inventory-price {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .add-to-cart {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 10px;
            background: var(--gradient);
            color: white;
            font-weight: 600;
            cursor: pointer;
        }
        .stock-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
        }
        .in-stock {
            background: rgba(46, 213, 115, 0.9);
            color: white;
        }

        .low-stock {
            background: rgba(255, 179, 0, 0.9);
            color: white;
        }

        .out-stock {
            background: rgba(255, 71, 87, 0.9);
            color: white;
        }

        /* Cart Badge */
        .cart-count {
            background: var(--secondary);
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            font-size: 0.8rem;
            margin-left: 0.3rem;
        }
        
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="nav-content">
        <div class="logo">Megha Sales</div>
        <div class="nav-links">
            <a href="#home">Home</a>
            <a href="#inventory">Discover</a>
            <a href="#contact">Contact</a>
            <a href="cart2.html">Cart <span id="cartCount" class="cart-count">0</span></a>
            <a href="logout.php">Logout</span></a>
            <a href="register.php">Register</span></a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1>Tech Dreams, Real Deals</h1>
            <p>Discover premium electronics for your digital lifestyle.</p>
            <a href="#inventory" class="cta-button">Explore Collection</a>
        </div>
    </section>

    <!-- Inventory Section -->
    <section id="inventory" class="inventory-section">
        <div class="section-header fade-up">
            <h2>Featured Products</h2>
            <p>Explore our handpicked selection of premium electronics, crafted for performance and style.</p>
        </div>

        <div class="inventory-grid">
<!-- Product 7 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/keyboard.jpeg" alt="Keyboard" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Accessories</div>
        <h3 class="inventory-title">Mechanical Keyboard</h3>
        <div class="inventory-price">₹2999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Product 8 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/mouse.jpeg" alt="Mouse" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Accessories</div>
        <h3 class="inventory-title">Wireless Mouse</h3>
        <div class="inventory-price">₹1499</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Product 9 -->
<div class="inventory-card fade-up">
    <span class="stock-badge low-stock">Low Stock</span>
    <img src="images/Led.jpg" alt="Monitor" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Peripherals</div>
        <h3 class="inventory-title">24" LED Monitor</h3>
        <div class="inventory-price">₹9999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Product 10 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/hard.jpeg" alt="External Hard Drive" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Storage</div>
        <h3 class="inventory-title">1TB External HDD</h3>
        <div class="inventory-price">₹4999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Product 11 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/printer.png" alt="Printer" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Peripherals</div>
        <h3 class="inventory-title">All-in-One Printer</h3>
        <div class="inventory-price">₹12499</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Product 12 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/router .jpeg" alt="Router" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Networking</div>
        <h3 class="inventory-title">Wi-Fi 6 Router</h3>
        <div class="inventory-price">₹6999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Additional Product 4 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/tablet.jpeg" alt="Tablet" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Tablets</div>
        <h3 class="inventory-title">Tab Master 2024</h3>
        <div class="inventory-price">₹29999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Additional Product 5 -->
<div class="inventory-card fade-up">
    <span class="stock-badge low-stock">Low Stock</span>
    <img src="images/audio.jpeg" alt="Wireless Earbuds" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Accessories</div>
        <h3 class="inventory-title">AudioPods Max</h3>
        <div class="inventory-price">₹8999</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

<!-- Additional Product 6 -->
<div class="inventory-card fade-up">
    <span class="stock-badge in-stock">In Stock</span>
    <img src="images/chronos.jpg" alt="Smartwatch" class="inventory-image">
    <div class="inventory-info">
        <div class="inventory-category">Wearables</div>
        <h3 class="inventory-title">Chronos Watch Pro</h3>
        <div class="inventory-price">₹15499</div>
        <button class="add-to-cart">Add to Cart</button>
    </div>
</div>

            <!-- Product 1 -->
            <div class="inventory-card fade-up">
                <span class="stock-badge in-stock">In Stock</span>
                <img src="images/pro.avif" alt="Premium Laptop" class="inventory-image">
                <div class="inventory-info">
                    <div class="inventory-category">Laptops</div>
                    <h3 class="inventory-title">Ultra Pro Laptop</h3>
                    <div class="inventory-price">₹89999</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="inventory-card fade-up">
                <span class="stock-badge low-stock">Low Stock</span>
                <img src="images/galaxy.webp" alt="Smartphone" class="inventory-image">
                <div class="inventory-info">
                    <div class="inventory-category">Smartphones</div>
                    <h3 class="inventory-title">Galaxy Pro Max</h3>
                    <div class="inventory-price">₹54999</div>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="inventory-card fade-up">
                <span class="stock-badge out-stock">Sold Out</span>
                <img src="images/console.webp" alt="Gaming Console" class="inventory-image">
                <div class="inventory-info">
                    <div class="inventory-category">Gaming</div>
                    <h3 class="inventory-title">NextGen Console</h3>
                    <div class="inventory-price">₹49999</div>
                    <button class="add-to-cart" disabled style="background: #ccc;">Out of Stock</button>
                </div>
            </div>
        </div>
    </section>

    <footer id="contact" style="background: var(--gradient); color: white; padding: 2rem; text-align: center;">
        <h2>Contact Us</h2>
        <p>Megha Sales</p>
        <p>Shambhu Bhawan, 2nd Rd, Near Nasrani Cinema, Sardarpura, Jodhpur, Rajasthan 342001, India</p>
        <p>Email: vmegha179@gmail.com | Phone: +91-9119372598</p>
    </footer>

    <!-- Script -->
    <script>
        const cartCount = document.getElementById('cartCount');
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);

        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', () => {
                const productCard = button.closest('.inventory-card');
                const productName = productCard.querySelector('.inventory-title').textContent;
                const productPrice = parseInt(productCard.querySelector('.inventory-price').textContent.replace('₹', ''));
                const existingItem = cart.find(item => item.name === productName);

                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({ name: productName, price: productPrice, quantity: 1 });
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
            });
        });
    </script>
</body>
</html>
