<?php include('../config/database.php'); ?>
<?php include('../templates/header.php'); ?>

<div class="container mt-5">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-success">
            <?php if ($_GET['status'] == 'updated'): ?>
                Data telah berhasil diperbarui.
            <?php elseif ($_GET['status'] == 'added'): ?>
                Data telah berhasil ditambahkan.
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h2>Search Leads</h2>
            <a href="index.php" class="btn btn-danger">Kembali</a>
            <a href="leads.php" class="btn btn-primary">Tambah Leads</a>
        </div>
        <div class="card-body ">
            <form method="GET" action="" class="mb-4">
            <h4>Cari Data Berdasarkan Product</h4>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="produk" class="form-control" placeholder="Nama Product">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <form method="GET" action="" class="mb-4">
            <h4>Cari Data Berdasarkan Sales dan Bulan</h4>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="sales" class="form-control" placeholder="Nama Sales">
                    </div>
                    <div class="col">
                        <input type="month" name="bulan" class="form-control" placeholder="Bulan ke">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Sales</th>
                        <th>Produk</th>
                        <th>Nama Lead</th>
                        <th>No. WhatsApp</th>
                        <th>Kota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $search_query = "
                        SELECT leads.*, sales.nama_sales, produk.nama_produk 
                        FROM leads 
                        JOIN sales ON leads.id_sales = sales.id_sales 
                        JOIN produk ON leads.id_produk = produk.id_produk
                    ";

                    if (isset($_GET['produk']) && !empty($_GET['produk'])) {
                        $produk = $mysqli->real_escape_string($_GET['produk']);
                        $search_query .= " WHERE produk.nama_produk LIKE '%$produk%'";
                    }

                    if ((isset($_GET['sales']) && !empty($_GET['sales'])) || (isset($_GET['bulan']) && !empty($_GET['bulan']))) {
                        if (isset($_GET['produk']) && !empty($_GET['produk'])) {
                            $search_query .= " AND";
                        } else {
                            $search_query .= " WHERE";
                        }

                        if (isset($_GET['sales']) && !empty($_GET['sales'])) {
                            $sales = $mysqli->real_escape_string($_GET['sales']);
                            $search_query .= " sales.nama_sales LIKE '%$sales%'";
                        }

                        if (isset($_GET['sales']) && !empty($_GET['sales']) && isset($_GET['bulan']) && !empty($_GET['bulan'])) {
                            $search_query .= " AND";
                        }

                        if (isset($_GET['bulan']) && !empty($_GET['bulan'])) {
                            $bulan = $mysqli->real_escape_string($_GET['bulan']);
                            $search_query .= " DATE_FORMAT(leads.tanggal, '%Y-%m') = '$bulan'";
                        }
                    }

                    $leads_result = $mysqli->query($search_query);
                    while($lead = $leads_result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$lead['id_leads']}</td>
                            <td>{$lead['tanggal']}</td>
                            <td>{$lead['nama_sales']}</td>
                            <td>{$lead['nama_produk']}</td>
                            <td>{$lead['nama_lead']}</td>
                            <td>{$lead['no_wa']}</td>
                            <td>{$lead['kota']}</td>
                            <td>
                                <a href='leads.php?id_leads={$lead['id_leads']}' class='btn btn-warning'>Edit</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../templates/footer.php'); ?>
