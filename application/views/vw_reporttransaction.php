
<div class="row">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">&nbsp; <span><i class="fas fa-database"></i> &nbsp; Report</span></li>
    <li class="breadcrumb-item active text-primary" aria-current="page">Transaction</li>
  </ol>
</nav>
</div>

<div class="row m-4">

    <div class="card col shadow mb-4">
        <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">DATA TRANSACTION</h5></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                            id="table-report-transaction"
                            class="table table-bordered table-hover text-dark"
                            data-search="true"
                            data-search-highlight="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-sort-name="code"
                            data-sort-order="asc"
                            data-show-export="true"
                            data-export-data-type="all"
                            data-cookie="true"
                            data-cookie-id-table="saveTransactionReportId"
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
                            <th class="py-2" data-align="center"  data-field="codeCompany">ACCOUNT</th>
                            <th class="py-2" data-align="left"    data-field="nameCompany">COMPANY</th>
                            <th class="py-2" data-align="right"   data-field="qty">QTY</th>
                            <th class="py-2" data-align="right"   data-field="rate">RATE <small >( IDR )</small></th>
                            <th class="py-2" data-align="right"   data-field="gross">GROSS <small >( IDR )</small></th>
                            <th class="py-2" data-align="center"  data-field='dateCreated'>DATE CREATED</th>
                            <th class="py-2" data-align="center"  data-field='dateEdited'>DATE EDITED</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>



