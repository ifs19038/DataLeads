<?php include('../config/database.php'); ?>
<?php include('../templates/header.php'); ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Selamat Datang Di Tambah Leads</h2>
            <a href="index.php" class="btn btn-success">Kembali</a>
        </div>
        <div class="card-body">
            <form action="save_lead.php" method="post">
                <?php if (isset($_GET['id_leads'])): ?>
                    <?php
                    $id_leads = $_GET['id_leads'];
                    $lead_query = "SELECT * FROM leads WHERE id_leads = '$id_leads'";
                    $lead_result = $mysqli->query($lead_query);
                    $lead = $lead_result->fetch_assoc();
                    ?>
                    <input type="hidden" name="id_leads" value="<?php echo $lead['id_leads']; ?>">
                <?php endif; ?>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $lead['tanggal'] ?? ''; ?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="sales">Sales</label>
                        <select class="form-control" id="sales" name="sales" required>
                            <option value="">--Pilih Sales--</option>
                            <?php
                            $sales_query = "SELECT * FROM sales";
                            $sales_result = $mysqli->query($sales_query);
                            while($sales = $sales_result->fetch_assoc()) {
                                $selected = (isset($lead) && $lead['id_sales'] == $sales['id_sales']) ? 'selected' : '';
                                echo "<option value='{$sales['id_sales']}' $selected>{$sales['nama_sales']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="produk">Produk</label>
                        <select class="form-control" id="produk" name="produk" required>
                            <option value="">--Pilih Produk--</option>
                            <?php
                            $produk_query = "SELECT * FROM produk";
                            $produk_result = $mysqli->query($produk_query);
                            while($produk = $produk_result->fetch_assoc()) {
                                $selected = (isset($lead) && $lead['id_produk'] == $produk['id_produk']) ? 'selected' : '';
                                echo "<option value='{$produk['id_produk']}' $selected>{$produk['nama_produk']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="no_wa">No. WhatsApp</label>
                        <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?php echo $lead['no_wa'] ?? ''; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama_lead">Nama Lead</label>
                        <input type="text" class="form-control" id="nama_lead" name="nama_lead" value="<?php echo $lead['nama_lead'] ?? ''; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $lead['kota'] ?? ''; ?>" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger ml-2">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../templates/footer.php'); ?>
