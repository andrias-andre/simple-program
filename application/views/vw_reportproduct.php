
<div class="row">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">&nbsp; <span><i class="fas fa-database"></i> &nbsp; Report</span></li>
    <li class="breadcrumb-item active text-primary" aria-current="page">Product</li>
  </ol>
</nav>
</div>

<div class="row m-4">

    <div class="card col shadow mb-4">
        <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">REPORT PRODUCT</h5></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table
                            id="table-report-product"
                            class="table table-bordered table-hover text-dark"
                            data-search="true"
                            data-search-highlight="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-sort-name="name-row"
                            data-sort-order="asc"
                            data-show-export="true"
                            data-export-data-type="all"
                            data-cookie="true"
                            data-cookie-id-table="saveReportProductId"
                            data-url="<?= base_url('product/show'); ?>"
                            data-page-size="50">
                        <thead>
                            <tr class="text-center">
                            <th class="py-2" data-align="center" data-width="65" data-field="no">No</th>
                            <th class="py-2" data-align="center" data-field="code">CODE</th>
                            <th class="py-2" data-align="left"   data-field="name">NAME</th>
                            <th class="py-2" data-align="right"  data-field="buyingPrice">BUYING PRICE</th>
                            <th class="py-2" data-align="right"  data-field="sellingPrice">SELLING PRICE</th>
                            <th class="py-2" data-align="center" data-field='dateCreated'>DATE CREATED</th>
                            <th class="py-2" data-align="center" data-field='dateEdited'>DATE EDITED</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </div>
</div>