<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .container {
            font-family: 'Times New Roman', Times, serif;
        }

        .checkout-box {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
        }

        .pickup-location .icon {
            background-color: #FFC107;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .item {
            border-top: 1px dotted #ddd;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .item-name {
            font-weight: bold;
        }

        .payment-summary h5 {
            margin-top: 20px;
            font-weight: bold;
        }

        .payment-method label {
            font-weight: bold;
        }

        .payment-method h5 {
            font-weight: bold;
        }

        #cartItems li {
            list-style: none;
            padding: 10px;
            border-top: 1px dotted #ddd;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="checkout-box p-4 border rounded">
            <div class="pickup-location d-flex align-items-center mb-3">
                <div class="icon me-2">
                    <i class="fa-solid fa-house"></i>
                    <i class="bi bi-house-fill text-warning" style="font-size: 2rem;"></i>
                </div>
                <div>
                    <p class="fw-bold">Ambil pesanamu di</p>
                    <p>Jimbaran, Bali</p>
                </div>
            </div>

            <div id="itemsContainer">
                <div id="itemTemplate" class="item d-flex align-items-center mb-3" style="display: none;">
                    <h5 class="item-name mb-0">Detail Pesanan</h5>
                    <p class="item-price ms-auto">Rp 0,00</p>
                    <button class="btn btn-outline-secondary btn-sm ms-3 mt-0">Tambah</button>
                </div>
            </div>

            <div class="payment-summary mt-4">
                <h5>Rincian Pembayaran</h5>
                <p>Total Harga : Rp<span id="cartTotal">0</span>,00</p>
                <div class="payment-method mb-3">
                    <h5>Metode Pembayaran</h5>
                    <label><input type="radio" name="paymentMethod" value="CASH" checked> CASH</label>
                    <label class="ms-3"><input type="radio" name="paymentMethod" value="BCA"> BCA</label>
                </div>
                <button class="btn btn-danger w-100" onclick="checkout()">PESAN</button>
            </div>
        </div>
    </div>

    <!-- start java -->
    <script src="../js/script.js">
        let cart = [];

        function addItem(name, price) {
            cart.push({
                name,
                quantity: 1,
                price
            });
            renderCart();
        }

        function renderCart() {
            const cartItems = document.getElementById('cartItems');
            cartItems.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `${item.name} - Rp${item.price.toLocaleString()} x ${item.quantity}`;
                cartItems.appendChild(li);
                total += item.price * item.quantity;
            });

            document.getElementById('cartTotal').textContent = total.toLocaleString();
        }

        function checkout() {
            const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;

            fetch('checkout.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        cart,
                        paymentMethod
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Checkout berhasil!');
                        cart = [];
                        renderCart();
                    } else {
                        alert('Checkout gagal.');
                    }
                });
        }
    </script>
    <!-- End java -->

    <!-- start script php-->
    <?php
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sunmor_db";
    $dbport = "3307";

    $conn = new mysqli($servername, $username, $password, $dbname, $dbport);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Baca data JSON
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data['cart'])) {
        $cart = $data['cart'];
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $paymentMethod = $conn->real_escape_string($data['paymentMethod']);

        $sql = "INSERT INTO tbl_orders (total, payment_method) VALUES ($total, '$paymentMethod')";
        if ($conn->query($sql) === TRUE) {
            $orderId = $conn->insert_id;

            foreach ($cart as $item) {
                $name = $conn->real_escape_string($item['name']);
                $quantity = $item['quantity'];
                $price = $item['price'];

                $sql = "INSERT INTO tbl_orders_items (order_id, item_name, quantity, price)
                    VALUES ($orderId, '$name', $quantity, $price)";
                $conn->query($sql);
            }

            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $conn->error]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "Keranjang kosong"]);
    }

    $conn->close();
    ?>

    <!-- end script php -->



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"></script>
</body>

</html>