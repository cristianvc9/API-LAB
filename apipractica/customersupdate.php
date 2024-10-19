<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$customerId = isset($_GET['id']) ? $_GET['id'] : 1; 
$apiUrl = "http://10.0.0.36/api/customers/$customerId";
$apiKey = 'UWU7Z1QDI4AF8YZLF3CG5R6EBXR5DB8M';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

try {
    $customerDetails = new SimpleXMLElement($response);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newFirstname = $_POST['firstname'];
        $newLastname = $_POST['lastname'];
        $newEmail = $_POST['email'];

        $customerDetails->customer->firstname = $newFirstname;
        $customerDetails->customer->lastname = $newLastname;
        $customerDetails->customer->email = $newEmail;

        $updatedCustomerXml = $customerDetails->asXML();

        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $updatedCustomerXml);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/xml',
            'Content-Length: ' . strlen($updatedCustomerXml)
        ]);

        $putResponse = curl_exec($ch);

        if ($putResponse === false) {
            echo 'Error al hacer la solicitud PUT: ' . curl_error($ch);
        } else {
            echo 'Cliente actualizado correctamente.';
        }
    }

    curl_close($ch);
} catch (Exception $e) {
    echo 'Error al procesar el XML: ' . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        <aside class="left-sidebar">
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="index.html" class="text-nowrap logo-img">
                    <img src="assets/images/logos/logo.svg" alt="" />
                </a>
            </div>
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">Clientes</li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="customerslist.php" aria-expanded="false">
                            <iconify-icon icon="solar:user-plus-rounded-line-duotone"></iconify-icon>
                            <span class="hide-menu">Listar clientes</span>
                        </a>
                    </li>
                    <li>
                        <span class="sidebar-divider lg"></span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="form.html" aria-expanded="false">
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Registrar Cliente</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="productlist.php" aria-expanded="false">
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Productos</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>

            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <h2>Editar Cliente</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Nombre:</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo htmlspecialchars($customerDetails->customer->firstname); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellido:</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo htmlspecialchars($customerDetails->customer->lastname); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($customerDetails->customer->email); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>