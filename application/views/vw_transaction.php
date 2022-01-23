
<div class="row">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">&nbsp; <span><i class="fas fa-database"></i> &nbsp; Data</span></li>
    <li class="breadcrumb-item active text-primary" aria-current="page">Transaction</li>
  </ol>
</nav>
</div>

<div class="row m-4">

    <div class="card col shadow mb-4">
        <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">DATA TRANSACTION</h5></div>
            <div class="card-body">
                <button class="btn btn-success" type="button" onclick="javascript:openModelAdd();"><i class="fas fa-plus"></i> &nbsp; NEW</button>
                <div class="table-responsive">
                    <table
                            id="table-transaction"
                            class="table table-bordered table-hover text-dark"
                            data-search="true"
                            data-search-highlight="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-sort-name="code"
                            data-sort-order="asc"
                            data-cookie="true"
                            data-cookie-id-table="saveTransactionId"
                            data-url="<?= base_url('transaction/show'); ?>"
                            data-page-size="50">
                        <thead>
                            <tr class="text-center">
                            <th class="py-2" data-align="center"  data-width="65" data-field="no">No</th>
                            <th class="py-2" data-align="center"  data-field="docno">DOCNO</th>
                            <th class="py-2" data-align="center"  data-field="date">DATE</th>
                            <th class="py-2" data-align="center"  data-field="type">TYPE</th>
                            <th class="py-2" data-align="center"  data-field="codeProduct">PRODUCT CODE</th>
                            <th class="py-2" data-align="left"    data-field="nameProduct">PRODUCT NAME</th>
                            <th class="py-2" data-align="left"    data-field="nameCompany">COMPANY</th>
                            <th class="py-2" data-align="right"   data-field="qty">QTY</th>
                            <th class="py-2" data-align="right"   data-field="rate">RATE <small >( IDR )</small></th>
                            <th class="py-2" data-align="right"   data-field="gross">GROSS <small >( IDR )</small></th>
                            <th class="py-2" data-align="center"  data-width="280" data-field='option'>OPTION</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>




<div class="modal text-dark fade" id="addNewTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addNewTransactionModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTransactionModalLabel">Form New Transaction</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

            <input type="hidden" id="csrfToken" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" >

            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="codeTransactionAdd" class="col-form-label">Document No :</label>
                    <input type="text" class="form-control" id="docnoTransactionAdd" name="docnoTransactionAdd" readonly autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="dateTransactionAdd" class="col-form-label">Date :</label>
                    <input type="text" class="form-control datepicker" id="dateTransactionAdd" name="dateTransactionAdd" autocomplete="off" required>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="companyTransactionAdd" class="col-form-label">Company :</label>
                    <select class="form-control" name="companyTransactionAdd" id="companyTransactionAdd">
                    <?php foreach($company as $item){ ?>
                        <option value="<?= $item->id_company; ?>"><?= $item->code.' - '.$item->name; ?></option>
                    <?php } ?>
                </select>
                    
                </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="typeTransactionAdd" class="col-form-label">Type :</label>
                <select class="form-control productTransactionAdd" name="typeTransactionAdd" id="typeTransactionAdd">
                    <option value="Purchase Order">PURCHASE ORDER</option>
                    <option value="Return Purchase Order">RETURN PURCHASE ORDER</option>
                    <option value="Sales Order">SALES ORDER</option>
                    <option value="Return Sales Order">RETURN SALES ORDER</option>
                </select>


                </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                <div class="form-group">
                <label for="productTransactionAdd" class="col-form-label">Product :</label>
            
                
                <select class="form-control productTransactionAdd" required name="productTransactionAdd " id="productTransactionAdd">
                    <option value="">CHOOSE PRODUCT</option>
                    <?php foreach($product as $item){ ?>
                        <option value="<?= $item->id_product; ?>"><?= $item->code.' - '.$item->name; ?></option>
                    <?php } ?>
                </select>
            
            </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="qtyTransactionAdd" class="col-form-label">Qty :</label>
                    <input type="number" min="0" class="form-control  " id="qtyTransactionAdd" name="qtyTransactionAdd" autocomplete="off" required>
                    </div>
                </div>

            </div>




            <div class="row">



                <div class="col">
                    <div class="form-group">
                    <label for="rateTransactionAdd" class="col-form-label"><span id="remarksRateAdd">Rate</span> :</label>
                    <input type="text" class="form-control currency text-right" readonly id="rateTransactionAdd" name="rateTransactionAdd" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="grossTransactionAdd" class="col-form-label">Gross :</label>
                    <input type="text" class="form-control currency text-right" readonly id="grossTransactionAdd" name="grossTransactionAdd" autocomplete="off" required>
                    </div>
                </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" id="btnSaveTransaction" name="btnSaveTransaction" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; SAVE</button>
        </div>
      
    </div>
  </div>
</div>





<div class="modal text-dark fade" id="editTransactionModal" tabindex="-1" role="dialog" aria-labelledby="editTransactionModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTransactionModalLabel">Form Edit Transaction</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        <div class="modal-body">

            <div class="row">

            <input type="hidden" name="idTransactionEdit" id="idTransactionEdit">

                <div class="col">
                    <div class="form-group">
                    <label for="codeTransactionEdit" class="col-form-label">Document No :</label>
                    <input type="text" class="form-control" id="docnoTransactionEdit" name="docnoTransactionEdit" readonly autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="dateTransactionEdit" class="col-form-label">Date :</label>
                    <input type="text" class="form-control datepicker" id="dateTransactionEdit" name="dateTransactionEdit" autocomplete="off" required>
                    </div>
                </div>


            </div>


            <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="companyTransactionEdit" class="col-form-label">Company :</label>
                    <select class="form-control" name="companyTransactionEdit" id="companyTransactionEdit">
                    <?php foreach($company as $item){ ?>
                        <option value="<?= $item->id_company; ?>"><?= $item->code.' - '.$item->name; ?></option>
                    <?php } ?>
                </select>
                    
                </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="typeTransactionEdit" class="col-form-label">Type :</label>
                <select class="form-control productTransactionEdit" name="typeTransactionEdit" id="typeTransactionEdit">
                    <option value="Purchase Order">PURCHASE ORDER</option>
                    <option value="Return Purchase Order">RETURN PURCHASE ORDER</option>
                    <option value="Sales Order">SALES ORDER</option>
                    <option value="Return Sales Order">RETURN SALES ORDER</option>
                </select>


                </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                <div class="form-group">
                <label for="productTransactionEdit" class="col-form-label">Product :</label>
            
                
                <select class="form-control productTransactionEdit" required name="productTransactionEdit " id="productTransactionEdit">
                    <option value="">CHOOSE PRODUCT</option>
                    <?php foreach($product as $item){ ?>
                        <option value="<?= $item->id_product; ?>"><?= $item->code.' - '.$item->name; ?></option>
                    <?php } ?>
                </select>
            
            </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="qtyTransactionEdit" class="col-form-label">Qty :</label>
                    <input type="number" min="0" class="form-control  " id="qtyTransactionEdit" name="qtyTransactionEdit" autocomplete="off" required>
                    </div>
                </div>

            </div>




            <div class="row">



                <div class="col">
                    <div class="form-group">
                    <label for="rateTransactionEdit" class="col-form-label"><span id="remarksRateEdit">Rate</span> :</label>
                    <input type="text" class="form-control currency text-right" readonly id="rateTransactionEdit" name="rateTransactionEdit" autocomplete="off" required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="grossTransactionEdit" class="col-form-label">Gross :</label>
                    <input type="text" class="form-control currency text-right" readonly id="grossTransactionEdit" name="grossTransactionEdit" autocomplete="off" required>
                    </div>
                </div>


            </div>



        </div>
        <div class="modal-footer">
          <button type="button" id="btnUpdateTransaction" name="btnUpdateTransaction" class="btn btn-success"><i class="fas fa-save"></i> &nbsp; UPDATE</button>
        </div>
      
    </div>
  </div>
</div>
