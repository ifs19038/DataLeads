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
            <h2>Daftar Leads</h2>
            <a href="leads.php" class="btn btn-primary">Tambah Leads</a>
            <a href="search_leads.php" class="btn btn-success">Search Leads</a>
        </div>
        <div class="card-body">
            <h3>Data Leads Bulan Ini</h3>
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
                    // Ambil bulan dan tahun saat ini
                    $bulan_ini = date('m');
                    $tahun_ini = date('Y');

                    $leads_query = "
                        SELECT leads.*, sales.nama_sales, produk.nama_produk 
                        FROM leads 
                        JOIN sales ON leads.id_sales = sales.id_sales 
                        JOIN produk ON leads.id_produk = produk.id_produk 
                        WHERE MONTH(leads.tanggal) = '$bulan_ini' AND YEAR(leads.tanggal) = '$tahun_ini'
                    ";
                    $leads_result = $mysqli->query($leads_query);
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
