
<div class="row">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">&nbsp; <span><i class="fas fa-database"></i> &nbsp; Data</span></li>
    <li class="breadcrumb-item active text-primary" aria-current="page">Product</li>
  </ol>
</nav>
</div>

<div class="row m-4">

    <div class="card col shadow mb-4">
        <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">DATA PRODUCT</h5></div>
            <div class="card-body">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addNewProductModal"><i class="fas fa-plus"></i> &nbsp; NEW</button>
                <div class="table-responsive">
                    <table
                            id="table-product"
                            class="table table-bordered table-hover text-dark"
                            data-search="true"
                            data-search-highlight="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-sort-name="name-row"
                            data-sort-order="asc"
                            data-cookie="true"
                            data-cookie-id-table="saveProductId"
                            data-url="<?= base_url('product/show'); ?>"
                            data-page-size="50">
                        <thead>
                            <tr class="text-center">
                            <th class="py-2" data-align="center" data-width="65" data-field="no">No</th>
                            <th class="py-2" data-align="center" data-field="code">CODE</th>
                            <th class="py-2" data-align="left"   data-field="name">NAME</th>
                            <th class="py-2" data-align="right"  data-field="buyingPrice">BUYING PRICE</th>
                            <th class="py-2" data-align="right"  data-field="sellingPrice">SELLING PRICE</th>
                            <th class="py-2" data-align="center" data-width="280" data-field='option'>OPTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>




<div class="modal text-dark fade" id="addNewProductModal" tabindex="-1" role="dialog" aria-labelledby="addNewProductModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Form New Product</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

            <input type="hidden" id="csrfToken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >

            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="codeProductAdd" class="col-form-label">Code :</label>
                    <input type="text" class="form-control" id="codeProductAdd" name="codeProductAdd" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="nameProductAdd" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" id="nameProductAdd" name="nameProductAdd" autocomplete="off" required>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="buyingProductAdd" class="col-form-label">Buying Price :</label>
                    <input type="text" class="form-control text-right currency" id="buyingProductAdd" name="buyingProductAdd" autocomplete="off" placeholder="IDR 0.00" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="sellingProductAdd" class="col-form-label">Selling Price :</label>
                    <input type="text" class="form-control text-right currency" id="sellingProductAdd" name="sellingProductAdd" autocomplete="off" placeholder="IDR 0.00" required>
                    </div>
                </div>

            </div>




        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveProduct" name="btnSaveProduct" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SAVE</button>
        </div>
      
    </div>
  </div>
</div>

<div class="modal text-dark fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Form Edit Product</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">
        
            <input type="hidden" name="idProductEdit" id="idProductEdit">
            <input type="hidden" name="orginalCodeEdit" id="originalCodeEdit">
          
            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="codeProductEdit" class="col-form-label">Code :</label>
                    <input type="text" class="form-control" id="codeProductEdit" name="codeProductEdit" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="nameProductEdit" class="col-form-label">Name :</label>
                    <input type="text" class="form-control" id="nameProductEdit" name="nameProductEdit" autocomplete="off" required>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="buyingProductEdit" class="col-form-label">Buying Price :</label>
                    <input type="text" class="form-control text-right currency" id="buyingProductEdit" name="buyingProductEdit" autocomplete="off" placeholder="IDR 0.00" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="sellingProductEdit" class="col-form-label">Selling Price :</label>
                    <input type="text" class="form-control text-right currency" id="sellingProductEdit" name="sellingProductEdit" autocomplete="off" placeholder="IDR 0.00" required>
                    </div>
                </div>

            </div>
    </div>
    
    <div class="modal-footer">
    <button type="button"  name="btnUpdateProduct" id="btnUpdateProduct" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; UPDATE</button>
    </div>

    </div>
  </div>
</div>
